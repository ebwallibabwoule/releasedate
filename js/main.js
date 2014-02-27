var _debug = false;

/* create special console.log behavior */
(function() { 
    var proxied = console.log;
    console.debuglog = function() {
        if(_debug) return proxied.apply(this, arguments);
    };
})(); 

$(function() {
    
    var _yearsArray = [],
        _filesObject = {"files":[]},
        urls = {
            "discogs" : "http://api.discogs.com/database/search",
            "wikipedia": "https://en.wikipedia.org/w/api.php",
            "proxy": "prox.php?limit=400000&url=http://en.wikipedia.org/wiki/",
            "files": "files.php",
            "audio": "../audio/"
        };

    initialize = function() { 
        getFiles();
    }

    initialize();

    function optimizeYearsInFilesObject(file) {
        var fileIndex = _.findIndex(_filesObject.files, { 'name': file }),
            yearTag = _filesObject.files[fileIndex].tags.year;
        if(_filesObject.files[fileIndex].tags.year) {    
            if(_filesObject.files[fileIndex].tags.year.length>1) {
                var minYear = _.min(_filesObject.files[fileIndex].tags.year),
                    maxYear = _.max(_filesObject.files[fileIndex].tags.year),
                    diffYear = maxYear - minYear;

                if(diffYear < 4) {
                    _filesObject.files[fileIndex].tags.year = [];
                    _filesObject.files[fileIndex].tags.year.push(minYear);
                }

                _filesObject.files[fileIndex].tags.year = _.uniq(_filesObject.files[fileIndex].tags.year);

            }
        }
    }
   
    function renderFilesObject(container) {
        var list = '<% _.forEach(files, function(file) { %><li><%- file.name %> - <span><%- file.tags.year %> - <%- file.tags.artist %> - <%- file.tags.title %> - <%- file.tags.genre %></span></li><% }); %>';
        container.html(_.template(list, _filesObject));
    }


    function getWikiReleaseDate(searchSingle, callback) {
        console.debuglog("Querying wikipedia for " + searchSingle);

        $.ajax({
            url: urls.wikipedia,
            dataType: "jsonp",
            data: {
                srsearch: searchSingle,
                srlimit: 1,
                srprop: "",
                format: "json",
                action: "query",
                list: "search"
            },
            cache: false
        })
        .done(function(data) {
            console.debuglog("OK - Querying wikipedia done for " + searchSingle);

            var response = (data && data.query && data.query.search[0]) ? data.query.search[0] : '';

            if (response) {
                var title = encodeURIComponent(response.title.replace(/\ /g, '_'));

                console.debuglog("OK - Got wikipedia query response" + searchSingle, title);
                console.debuglog("Grabbing wikipedia page" + searchSingle, urls.proxy + title);

                $.ajax({
                    url: urls.proxy + title,
                    cache: false
                })
                .done(function(html) {
                    console.debuglog("OK - Got wikipedia page" + searchSingle, html.substring(0,20));

                    var releaseIdentifier = $("th:contains('Release')", html),
                        releaseValue = (releaseIdentifier) ? releaseIdentifier.next().html() : '',
                        releaseYear = (releaseValue) ? releaseValue.match(/\d{4}/) : '';

                    console.debuglog("OK - Got wikipedia year", releaseYear);

                    callback(releaseYear);
                });
            }
            else {
                console.debuglog("NOK! - No wikipedia query response" + searchSingle, title);
            }
        })
        .fail(function(){
            console.debuglog("NOK! - Failed wikipedia query" + searchSingle);
        })
    }

    function getDiscogsReleaseDate(searchSingle, callback) {
        var song = searchSingle;

        $.ajax({ 
            url: urls.discogs, 
            type: "GET", 
            dataType: 'jsonp', 
            data: { 
                q: song/*,                
                format: "single"*/
            }, 
            cache: false
        })
        .done(function(data) {
            var response;
            for(var i=0;i<5;i++){
                response = data.data.results[i];
                if(data && data.data && data.data.results[i] && data.data.results[i].year) {
                    console.debuglog(response.year);

                    callback(response.year);
                    break;
                }
            }
            if (!response) {
                    console.debuglog("NOK", data);
            }
        })
        .fail(function(){
             console.debuglog("NOK failed to get data");
        })
    }    

    function getRoviReleaseDate(searchSingle, callback) {
        var song = encodeURIComponent(searchSingle.replace(/\ /g, '+')),
            apiKey = "dfqnz9ymrde5h2rdpxnpaqku",
            sig = "aEvCvQNAQS",
            apiKey = apiKey.trim(),
            secret = sig.trim(),
            curdate = new Date(),
            gmtstring = curdate.toGMTString(),
            utc = Date.parse(gmtstring) / 1000,
            md5hash = hex_md5(apiKey + secret + utc);

        $.ajax({ 
            url: "md5.php",
            type: "GET",
            cache: false,
            data: {
                "auth": md5hash,
                "search": song
            }
        })
        .done(function(data) {
            for(var i=0;i<5;i++){
                response = data.searchResponse.results[i];
                if(response) {
                    console.debuglog(response.year);
                    releaseYear = (data.searchResponse.results[0].album.originalReleaseDate) ? data.searchResponse.results[0].album.originalReleaseDate.match(/\d{4}/) : '';
                    callback(releaseYear);
                    //callback(response.year);
                    break;
                }
            }
        })
        .fail(function(){
             console.debuglog("NOK failed to get data");
        })

    }


    function getMusicBrainzReleaseDate(artist, title, callback) {
        var searchSingle = artist + " " + title;        
        var song = encodeURIComponent(searchSingle.replace(/\ /g, '_'));

        $.ajax({ 
            url: "musicbrainz.php",
            type: "GET",
            cache: false,
            data: {
                "search": song
            }
        })
        .done(function(data) {
            var release = data['release-list'].release;
            for(var i=0;i<release.length;i++){

                //if(release[i].title == title) console.log("!!", release[i].title, release[i]['artist-credit']['name-credit'].artist);
                if( release[i]['artist-credit']['name-credit'].artist && release[i]['artist-credit']['name-credit'].artist.name == artist) { 
                   // console.log(release[i].title, release[i]['artist-credit']['name-credit'].artist.name,  release[i].title, release[i].date , "<======");
                    callback((release[i].date) ? release[i].date.match(/\d{4}/) : '');
                    break;
                }
                else { 
                    // for(var x=0;x<release[i]['artist-credit']['name-credit'].artist.length;x++){
                    //     console.log(release[i].title, release[i]['artist-credit']['name-credit'].artist[x].name, " ?? "); 
                    // }
                }

            }

        })
        .fail(function(){
             console.debuglog("NOK failed to get data");
        })

    }


    function getTag(file, callback) {
        console.debuglog("Getting tags for ", file);

        $.ajax({ 
            url: "demos/test.php", 
            dataType: "json", 
            data: { 
                Filename: file,
                format: "JSON"
            }, 
            cache: false
        })
        .done(function(tag) {
            console.debuglog("OK - got tags for " + file, tag);

            callback(tag);
        }) 
    }

    function postTag(file, tag) {
        function fixPostTagValue(value){
            return value; //JSON.stringify(value).substring(1, JSON.stringify(value).length - 1);
        }


       // console.log(file, tag, tag.artist, _filesObject);
        if(tag) {


            var that = $(this),
                song = that.text(),
                li = that.parent(),
                artist = (tag.artist) ? (tag.artist) : '', 
                title = (tag.title) ? (tag.title) : '',
                year = (tag.year) ? tag.year.join() : '',
                genre = (tag.genre) ? (tag.genre) : '';

            console.debuglog("About to write tags for " + file, tag);

            $.ajax({ 
                url: "demos/test.php", 
                type: "POST", 
                data: { 
                    Filename: file,
                    TagFormatsToWrite: ["id3v1","id3v2.3"],
                    WriteTags: "Save Changes",
                    Artist: artist,
                    Title: title,
                    Year: year,
                    GenreOther: genre 
                }, 
                cache: false
            })
            .done(function(data) {
                console.debuglog("OK - tags written for " + file, tag);

            })
            .fail(function(){
                console.debuglog("NOK! - write POST failed for " + file);
            })
        }
    }

   function getFiles(){
        $.ajax({ 
            url: urls.files, 
            type: "GET", 
            dataType: 'json', 
            data: { 
                format: "json"
            }, 
            cache: false
        })
        .done(function(data){
            _.forEach(data,function(file){
                _filesObject.files.push({"name": urls.audio + file, "tags": {}});
                //$("body").trigger(jQuery.Event("updateFilesObject", file, '1000'));

                getTag(urls.audio + file, function(tag){
                    var fileIndex = _.findIndex(_filesObject.files, { 'name': urls.audio + file });//,

                    //console.log(_filesObject.files[fileIndex], tag.tag.artist,"<=============");
                    if(!_filesObject.files[fileIndex].tags.artist) _filesObject.files[fileIndex].tags.artist = tag.tag.artist;
                    if(!_filesObject.files[fileIndex].tags.title) _filesObject.files[fileIndex].tags.title = tag.tag.title;
                    if(!_filesObject.files[fileIndex].tags.genre) _filesObject.files[fileIndex].tags.genre = tag.tag.genre;
                    $("body").trigger(jQuery.Event("renderFilesObject"));

                });
            });

        })
    }
                

    /* EVENTS */
    $("#knop").on('click', function(event) {
        _.forEach(_filesObject.files, function(file) {
            var file = file.name; 
            getTag(file, function(tag){
                var song = tag.tag.title + " " + tag.tag.artist;

                getWikiReleaseDate(song, function(year){
                    tag.tag.year = (year[0]) ? year[0] : '';

                    if (year[0]) {
                        $("body").trigger(jQuery.Event("updateFilesObject"), [file, year[0]]);

                        console.debuglog("OK - wikpedia found year for song " + song, year[0])
                        //postTag(file, tag);     
                    } else {
                        console.debuglog("NOK - no wikpedia year for song " + song)
                    }
                })
            });
        })
    });

    $("#knop2").on('click', function() {
        _.forEach(_filesObject.files, function(file) {

         //   getTag(file, function(tag){
                var song = file.tags.title + " " + file.tags.artist;
                getDiscogsReleaseDate(song, function(year){
                    $("body").trigger(jQuery.Event("updateFilesObject"), [file.name, year]);
                })
           // });
        });
    });

    $("#knop3").on('click', function() {
        _.forEach(_filesObject.files, function(file) {
            postTag(file.name,file.tags);
        });
    });

     $("#knop4").on('click', function() {
         _.forEach(_filesObject.files, function(file) {
            var song = file.tags.title + " " + file.tags.artist;
            getRoviReleaseDate(song,function(year){
                $("body").trigger(jQuery.Event("updateFilesObject"), [file.name, year]);
            });
        });
    });

     $("#knop5").on('click', function() {
         _.forEach(_filesObject.files, function(file) {
            
            getMusicBrainzReleaseDate(file.tags.artist, file.tags.title, function(year){
                $("body").trigger(jQuery.Event("updateFilesObject"), [file.name, year]);
            });
        });
    });


    $("body").on("renderFilesObject", function(e){
        renderFilesObject($("ol"));        
    });
    
    $("body").on("updateFilesObject", function(e, file, year){
        var fileIndex = _.findIndex(_filesObject.files, { 'name': file });//,

        if(!_filesObject.files[fileIndex].tags.year) _filesObject.files[fileIndex].tags.year = [];
        
        if(year) _filesObject.files[fileIndex].tags.year.push(year);
        
        if($('.optimize').is(':checked')) optimizeYearsInFilesObject(file);

        renderFilesObject($("ol")); 
        //console.log("==========>",_filesObject);
    });
 
});
