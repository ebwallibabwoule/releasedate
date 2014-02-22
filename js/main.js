var _debug = false;

/* create special console.log behavior */
(function() { 
    var proxied = console.log;
    console.debuglog = function() {
        if(_debug) return proxied.apply(this, arguments);
    };
})(); 

$(function() {
    var _yearsArray = [];
    
    String.prototype.replaceAll = function(str1, str2, ignore) {
        console.debuglog(str1, str2);
        return this.replace(new RegExp(str1.replace(/([\/\,\!\\\^\$\{\}\[\]\(\)\.\*\+\?\|\<\>\-\&])/g,"\\$&"),(ignore?"gi":"g")),(typeof(str2)=="string")?str2.replace(/\$/g,"$$$$"):str2);
    };

    function calculateBestYear(years) {
        var minYear = Math.min.apply(null, years), 
            maxYear = Math.max.apply(null, years);            
        if(maxYear - minYear < 4) {
            return minYear;
        }
    }

    var urls = {
        "discogs" : "http://api.discogs.com/database/search",
        "wikipedia": "https://en.wikipedia.org/w/api.php",
        "proxy": "prox.php?limit=400000&url=http://en.wikipedia.org/wiki/"
    }

// _yearsArray["/m1d1e.mp3"] = [111,4343,4343];
// _yearsArray.files[1] = [{"name":"/m22d22e.mp3","years": [222]}];
// _yearsArray.files[2] = [{"name":"/m333e.mp3","years": [333]}];

//     console.log(_yearsArray); 

//     topp = {"files": [{ "name" : "/sswsw/swd.mp3", "years" : ["34343", 545,5454,545] },{ "name" : "/sswsw/sw.mp3", "years" : ["343d43", 545,5454,545] }]};
//     var kaas = "";
//     for (file in topp.files){
//         for (year in topp.files[file].years){
//            kaas = kaas + "," + topp.files[file].years[year];
//         }
//             console.log(topp.files[file].name, kaas);

//     }

    $("#knop").on('click', function(event) {
        $("body").on("updateYearsArray", function(e, file, year){
            if(!_yearsArray[file]) _yearsArray[file] = []
            _yearsArray[file].push(parseInt(year) * Math.random()*parseInt(year));

            console.log(_yearsArray,_.min(_yearsArray[file]));

            
        });

        $('li>a:first-child').each(function(index) {
            var that = $(this),
                //song = that.text(),
                //li = that.parent(),
                file = that.data("file"); 


            getTag(file, function(tag){
                var song = tag.tag.title + " " + tag.tag.artist;
                // getDiscogsReleaseDates(song, function(year){
                //         //if(_yearsArray[file]) 
                //             _yearsArray[file] = year;

                //         $("body").trigger(jQuery.Event("updateYearsArray"));
                // })

                getWikiReleaseDates(song, function(year){
                    tag.tag.year = (year[0]) ? year[0] : '';

                    if (year[0]) {
                        //li.append('<a class="date" target="_blank" href="http://en.wikipedia.org/wiki/'  + '"">' + year[0] + "</a>");
                        

                        

                        $("body").trigger(jQuery.Event("updateYearsArray"), [file, year[0]]);
                        $("body").trigger(jQuery.Event("updateYearsArray"), [file, year[0]]);

                        console.debuglog("OK - wikpedia found year for song " + song, year[0])
                        //postTag(tag, file);     
                    } else {
                        console.debuglog("NOK - no wikpedia year for song " + song)

                        // li.append('<span class="no-release">no table header contains release</span>');
                        // $('.top').append('<div>' + li.html() + "</div>");
                    }
                })
            });

            /* limiting calls */
            if (index == 5) {
                $("#knop").off('click');

                return false
            }
        })
    });

    $("#knop2").on('click', function() {
        getDiscogsReleaseDates();
    });

    $("#knop3").on('click', function() {
        postTag();
    });

    $("#knop4").on('click', function() {
        getTag();
    });

    function getWikiReleaseDates(searchSingle, callback) {
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

                //li.append('<span class="no-page">no page found</span>');
                //$('.top').append('<div>' + li.html() + "</div>");
            }
        })
        .fail(function(){
            console.debuglog("NOK! - Failed wikipedia query" + searchSingle);

            // li.append('<span class="no-page">wikipedia API fail</span>');
            // $('.top').append('<div>' + li.html() + "</div>");
        })
    }

    function getDiscogsReleaseDates(searchSingle, callback) {

        //$('li>a:first-child').each(function(index) {
            var song = searchSingle;//,
               // li = that.parent();

            $.ajax({ 
                url: urls.discogs, 
                type: "GET", 
                dataType: 'jsonp', 
                data: { 
                    q: song,
                    format: "single"
                }, 
                cache: false
            })
            .done(function(data) {
                var response;
                //$(that).removeClass("throbber");
                for(var i=0;i<5;i++){
                    response = data.data.results[i];
                    if(data && data.data && data.data.results[i] && data.data.results[i].year) {
                        //li.append('<a class="date" target="_blank" href="http://www.discogs.com' + response.uri + '">' + response.year + "</a>");
                        console.debuglog(response.year);
                        _yearsArray.push(response.year);

                        callback(response.year);
                        break;
                    }
                }
                if (!response) {
                        console.debuglog("NOK", data);

                    // li.append('<span class="no-page">no page found</span>');
                    // $('.top').append('<div>' + li.html() + "</div>");
                }
            })
            .fail(function(){
                 console.debuglog("NOK failed to get data");
                // li.append('<span class="no-page">discogs API fail</span>');
                // $('.top').append('<div>' + li.html() + "</div>");
            })
            /* limiting calls */
            // if (index == 15) {
            //     $("#knop2").off('click');

            //     return false
            // }            
       // });            
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

    function postTag(tag, file) {
        var that = $(this),
            song = that.text(),
            li = that.parent();

        console.debuglog("About to write tags for " + file, tag);

        var options = { 
            Filename: file,
            TagFormatsToWrite: ["id3v1","id3v2.3"],
            WriteTags: "Save Changes",
            Artist: JSON.stringify(tag.tag.artist).substring(1, JSON.stringify(tag.tag.artist).length - 1),
            Title: JSON.stringify(tag.tag.title).substring(1, JSON.stringify(tag.tag.title).length - 1),
            Year: tag.tag.year,
            GenreOther: JSON.stringify(tag.tag.genre).substring(1, JSON.stringify(tag.tag.genre).length - 1)
        };

        $.ajax({ 
            url: "demos/test.php", 
            type: "POST", 
            data: options, 
            cache: false
        })
        .done(function(data) {
            console.debuglog("OK - tags written for " + file, tag);

        })
        .fail(function(){
            console.debuglog("NOK! - write POST failed for " + file);
        })

    }

});
