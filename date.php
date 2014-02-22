<!DOCTYPE html>
<html lang="en">
    <head>
      <link rel="stylesheet" href="css/main.css">
   </head>
    <body>
        <div class="top">
        </div>
        
        <button id="knop">Zoek Wikipedia</button>
        <button id="knop2">Zoek Discogs</button>
        <button id="knop3">Post</button>
        <button id="knop4">Get</button>
        
        <div>
            <ol>
                <?php
                if ($handle = opendir('./audio')) {
                    while (false !== ($file = readdir($handle)))
                    {
                        if ($file != "." && $file != ".." && strtolower(substr($file, strrpos($file, '.') + 1)) == 'mp3')
                        {
                            echo '<li><a href="#" data-file="../audio/'.$file.'">'.$file.'</a></li>';
                        }
                    }
                    closedir($handle);
                }
                ?>
                <!--
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Here Without You 3 Doors Down">Here Without You 3 Doors Down</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Kryptonite 3 Doors Down">Kryptonite 3 Doors Down</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Loser 3 Doors Down">Loser 3 Doors Down</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=When I'm Gone 3 Doors Down">When I'm Gone 3 Doors Down</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=What's up 4 Non Blondes">What's up 4 Non Blondes</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Whataya Want From Me Adam Lambert">Whataya Want From Me Adam Lambert</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Dream On Aerosmith">Dream On Aerosmith</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Jaded Aerosmith">Jaded Aerosmith</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Love In An Elevator Aerosmith">Love In An Elevator Aerosmith</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Hands Clean Alanis Morissette">Hands Clean Alanis Morissette</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=You Oughta Know Alanis Morrisette">You Oughta Know Alanis Morrisette</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Smooth Criminal Alien Ant Farm">Smooth Criminal Alien Ant Farm</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Fascination Alphabeat">Fascination Alphabeat</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Run Amy Macdonald">Run Amy Macdonald</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Keep On Moving On Andy Burrows">Keep On Moving On Andy Burrows</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Why Tell Me Why Anita Meyer">Why Tell Me Why Anita Meyer</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Don't Anouk">Don't Anouk</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Girl Anouk">Girl Anouk</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Good God Anouk">Good God Anouk</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=I Live For You Anouk">I Live For You Anouk</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Modern World Anouk">Modern World Anouk</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Nobody's Wife Anouk">Nobody's Wife Anouk</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Three Days In A Row Anouk">Three Days In A Row Anouk</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Woman Anouk">Woman Anouk</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=I Bet You Look Good On The Dancefloor Arctic Monkeys">I Bet You Look Good On The Dancefloor Arctic Monkeys</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Crucified Army Of Lovers">Crucified Army Of Lovers</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Pieces Of Me Ashlee Simpson">Pieces Of Me Ashlee Simpson</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Complicated Avril Lavigne">Complicated Avril Lavigne</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Losing Grip Avril Lavigne">Losing Grip Avril Lavigne</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Sk8er Boi Avril Lavigne">Sk8er Boi Avril Lavigne</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=What The Hell Avril Lavigne">What The Hell Avril Lavigne</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Love Shack B 52's">Love Shack B 52's</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Spin Around Bad Candy">Spin Around Bad Candy</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Punk Rock Song Bad Religion">Punk Rock Song Bad Religion</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Loser Beck">Loser Beck</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Heaven Is A Place On Earth Belinda Carlisle">Heaven Is A Place On Earth Belinda Carlisle</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Keep Your Head Up  Ben Howard">Keep Your Head Up  Ben Howard</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Another Day Bertolf">Another Day Bertolf</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Bubbles Biffy Clyro">Bubbles Biffy Clyro</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Many Of Horror Biffy Clyro">Many Of Horror Biffy Clyro</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Everybody Wants To Be Birgit">Everybody Wants To Be Birgit</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Few Like You Birgit">Few Like You Birgit</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=I Know Birgit">I Know Birgit</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Elephants (3FM Edit) Blaudzun">Elephants (3FM Edit) Blaudzun</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Promises Of No Man's Land Blaudzun">Promises Of No Man's Land Blaudzun</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=No Rain Blindmelon">No Rain Blindmelon</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=All The Small Things Blink 182">All The Small Things Blink 182</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=The Current Blue Man Group & Gavin Rossdale">The Current Blue Man Group & Gavin Rossdale</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Coffee And TV Blur">Coffee And TV Blur</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Girls And Boys Blur">Girls And Boys Blur</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Song 2 Blur">Song 2 Blur</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Buffalo Soldier Bob Marley">Buffalo Soldier Bob Marley</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Shuffle Bombay Bicycle Club">Shuffle Bombay Bicycle Club</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Little Numbers Boy">Little Numbers Boy</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Love Drunk Boys Like Girls">Love Drunk Boys Like Girls</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Two Is Better Than One Boys Like Girls">Two Is Better Than One Boys Like Girls</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Year 3000 Bust">Year 3000 Bust</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=You Said No Bust">You Said No Bust</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Show Me What I'm Looking For Carolina Liar">Show Me What I'm Looking For Carolina Liar</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Finally Begin Cold War Kids">Finally Begin Cold War Kids</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Clocks Coldplay">Clocks Coldplay</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Don't Panic Coldplay">Don't Panic Coldplay</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Fix You Coldplay">Fix You Coldplay</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=God Put A Smile Upon Your Face Coldplay">God Put A Smile Upon Your Face Coldplay</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Hurts Like Heaven Coldplay">Hurts Like Heaven Coldplay</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Life in Technicolor Coldplay">Life in Technicolor Coldplay</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Lost Coldplay">Lost Coldplay</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Lovers In Japan - Reign Of Love Coldplay">Lovers In Japan - Reign Of Love Coldplay</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Speed of sound Coldplay">Speed of sound Coldplay</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Talk Coldplay">Talk Coldplay</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=The Hardest Part Coldplay">The Hardest Part Coldplay</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=The Scientist Coldplay">The Scientist Coldplay</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Viva La Vida Coldplay">Viva La Vida Coldplay</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Yellow Coldplay">Yellow Coldplay</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Shine Collective Soul">Shine Collective Soul</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Accidentally in love Counting Crows">Accidentally in love Counting Crows</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Big Yellow Taxi Counting Crows">Big Yellow Taxi Counting Crows</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Mister Jones Counting Crows">Mister Jones Counting Crows</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Ode To My Family Cranberries">Ode To My Family Cranberries</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Zombie (Single Version) Cranberries">Zombie (Single Version) Cranberries</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Higher Creed">Higher Creed</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=My Sacrifice Creed">My Sacrifice Creed</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Better Be Home Soon Crowded House">Better Be Home Soon Crowded House</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Don't Dream It's Over Crowded House">Don't Dream It's Over Crowded House</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Four Seasons In One Day Crowded House">Four Seasons In One Day Crowded House</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Into Temptation Crowded House">Into Temptation Crowded House</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Weather With You Crowded House">Weather With You Crowded House</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Plage Crystal Fighters">Plage Crystal Fighters</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=I Believe In A Thing Called Love Darkness">I Believe In A Thing Called Love Darkness</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Home Daughtry">Home Daughtry</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=It's Not Over Daughtry">It's Not Over Daughtry</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Life After You Daughtry">Life After You Daughtry</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=No Surprise Daughtry">No Surprise Daughtry</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=China Girl David Bowie">China Girl David Bowie</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Light On David Cook">Light On David Cook</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Breakfast At Tiffany's Deep Blue Something">Breakfast At Tiffany's Deep Blue Something</a></li><li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Wasting My Time Default">Wasting My Time Default</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Frozen Delain">Frozen Delain</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Today Dennis">Today Dennis</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=You Gotta Be Des'Ree">You Gotta Be Des'Ree</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Rollercoaster Di Rect">Rollercoaster Di Rect</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=A Good Thing Di-Rect">A Good Thing Di-Rect</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Adrenaline Di-Rect">Adrenaline Di-Rect</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=I Just Can't Stand Di-Rect">I Just Can't Stand Di-Rect</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Johnny Di-Rect">Johnny Di-Rect</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Just The Way I Do Di-Rect">Just The Way I Do Di-Rect</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=My Generation Di-Rect">My Generation Di-Rect</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Boys Of Summer Don Henley">Boys Of Summer Don Henley</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Save tonight Eagle-Eye Cherry">Save tonight Eagle-Eye Cherry</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Hotel California Eagles">Hotel California Eagles</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Drunk Ed Sheeran">Drunk Ed Sheeran</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Anything Ed Struijlaart">Anything Ed Struijlaart</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=A Ton Of Love Editors">A Ton Of Love Editors</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=The Racing Rats Editors">The Racing Rats Editors</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Home (3FM Edit) Edward Sharpe & The Magnetic Zeros">Home (3FM Edit) Edward Sharpe & The Magnetic Zeros</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Grounds For Divorce Elbow">Grounds For Divorce Elbow</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=New York Morning !Audio\4. Rest\Elbow">New York Morning !Audio\4. Rest\Elbow</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Rock 'n' Roll Is King Electric Light Orchestra">Rock 'n' Roll Is King Electric Light Orchestra</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=It Ain't Easy Ellen Ten Damme">It Ain't Easy Ellen Ten Damme</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Bring Me To Life Evanescence">Bring Me To Life Evanescence</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Going Under Evanescence">Going Under Evanescence</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=My Immortal (Band Version) Evanescence">My Immortal (Band Version) Evanescence</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Here's To The Night Eve 6">Here's To The Night Eve 6</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Ghost Busters Film">Ghost Busters Film</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=So Long (Single Version) Fischer Z">So Long (Single Version) Fischer Z</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=The Worker Fischer Z">The Worker Fischer Z</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Hey, St Peter Flash & The Pan">Hey, St Peter Flash & The Pan</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Shake It Out  Florence + The Machine">Shake It Out  Florence + The Machine</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Cassius Foals">Cassius Foals</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Best of You Foo Fighters">Best of You Foo Fighters</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Rock The Boat Forrest">Rock The Boat Forrest</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Pumped Up Kicks  Foster the People">Pumped Up Kicks  Foster the People</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Lollipop Framing Hanley">Lollipop Framing Hanley</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Take Me Out Franz Ferdinand">Take Me Out Franz Ferdinand</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Hemorrhage (In My Hands) Fuel">Hemorrhage (In My Hands) Fuel</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=The Beginning Of The Twist Futureheads">The Beginning Of The Twist Futureheads</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Mama Genesis">Mama Genesis</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=That's All Genesis">That's All Genesis</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Lady Love Me (One More Time) George Benson">Lady Love Me (One More Time) George Benson</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Smoking On the Balcony  Go Back to the Zoo">Smoking On the Balcony  Go Back to the Zoo</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Here Is Gone Goo Goo Dolls">Here Is Gone Goo Goo Dolls</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Iris Goo Goo Dolls">Iris Goo Goo Dolls</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Lifestyles Of The Rich And The Famous Good Charlotte">Lifestyles Of The Rich And The Famous Good Charlotte</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=I Know Good Things End">I Know Good Things End</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Heavy Cross (Radio Edit) Gossip">Heavy Cross (Radio Edit) Gossip</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Somebody That I Used to Know Gotye & Kimbra">Somebody That I Used to Know Gotye & Kimbra</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=21 Guns Green Day">21 Guns Green Day</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Boulevard Of Broken Dreams Green Day">Boulevard Of Broken Dreams Green Day</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Wake Me Up When September Ends Green Day">Wake Me Up When September Ends Green Day</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Three Little Pigs Green Jelly">Three Little Pigs Green Jelly</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Tongue Tied Grouplove">Tongue Tied Grouplove</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=You Can't Stop Me Guano Apes">You Can't Stop Me Guano Apes</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Get Over It Guillemots">Get Over It Guillemots</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=November Rain Guns N' Roses">November Rain Guns N' Roses</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Sweet Child O' Mine Guns N' Roses">Sweet Child O' Mine Guns N' Roses</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Sky On Fire Handsome Poets">Sky On Fire Handsome Poets</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Mmmbop Hanson">Mmmbop Hanson</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=So Yesterday Hilary Duff">So Yesterday Hilary Duff</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Hate To Say I Told You So Hives">Hate To Say I Told You So Hives</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Hold My Hand Hootie & The Blowfish">Hold My Hand Hootie & The Blowfish</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Scattered Diamonds Hungry Kids of Hungary">Scattered Diamonds Hungry Kids of Hungary</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Lust For Life Iggy Pop">Lust For Life Iggy Pop</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Radioactive Imagine Dragons">Radioactive Imagine Dragons</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Drive Incubus">Drive Incubus</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Cruel Man Intwine">Cruel Man Intwine</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Get Outta My Head Intwine">Get Outta My Head Intwine</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Way Out Intwine">Way Out Intwine</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Mystify !Audio\4. Rest\INXS">Mystify !Audio\4. Rest\INXS</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Sitting, Waiting, Wishing Jack Johnson">Sitting, Waiting, Wishing Jack Johnson</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Lightning Bolt Jake Bugg">Lightning Bolt Jake Bugg</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=1973 James Blunt">1973 James Blunt</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Just Because Jane's Addiction">Just Because Jane's Addiction</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Are You Gonna Be My Girl Jet">Are You Gonna Be My Girl Jet</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Reggae Night Jimmy Cliff">Reggae Night Jimmy Cliff</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=The Middle Jimmy Eat World">The Middle Jimmy Eat World</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=The Middle Jimmy Eat World">The Middle Jimmy Eat World</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=October Swimmer JJ72">October Swimmer JJ72</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Half of My Heart John Mayer">Half of My Heart John Mayer</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=No Such Thing John Mayer">No Such Thing John Mayer</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Waiting On The World To Change John Mayer">Waiting On The World To Change John Mayer</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Ruby Kaiser Chiefs">Ruby Kaiser Chiefs</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Can You Handle Me Kane">Can You Handle Me Kane</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Head Down Kane">Head Down Kane</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=My Best Wasn't Good Enough Kane">My Best Wasn't Good Enough Kane</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=No Surrender Kane">No Surrender Kane</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Rain Down on Me Kane">Rain Down on Me Kane</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=So Glad You Made It Kane">So Glad You Made It Kane</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=A Bad Dream Keane">A Bad Dream Keane</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Bend And Break Keane">Bend And Break Keane</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Everybody's Changing Keane">Everybody's Changing Keane</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Nothing In My Way Keane">Nothing In My Way Keane</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Silenced By the Night Keane">Silenced By the Night Keane</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Somewhere Only We Know Keane">Somewhere Only We Know Keane</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=This Is the Last Time Keane">This Is the Last Time Keane</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Miss Independent Kelly Clarkson">Miss Independent Kelly Clarkson</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=We Are the Young Kensington">We Are the Young Kensington</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Annie I'm Not Your Daddy Kid Creola And The Coconuts">Annie I'm Not Your Daddy Kid Creola And The Coconuts</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=All Summer Long Kid Rock">All Summer Long Kid Rock</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Bette Davis Eyes Kim Carins">Bette Davis Eyes Kim Carins</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Teenage Superstar Kim-Lian">Teenage Superstar Kim-Lian</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Dancing In The Moonlight King Harvest">Dancing In The Moonlight King Harvest</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Sex On Fire Kings Of Leon">Sex On Fire Kings Of Leon</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Sex On Fire Kings Of Leon">Sex On Fire Kings Of Leon</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Supersoaker Kings Of Leon">Supersoaker Kings Of Leon</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Use Somebody Kings of Leon">Use Somebody Kings of Leon</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Plug It In & Turn Me On Krezip">Plug It In & Turn Me On Krezip</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Kula Shaker-Hey Dude Kula Shaker">Kula Shaker-Hey Dude Kula Shaker</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Pretend We're Dead L7">Pretend We're Dead L7</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Sunshine Reggae Laid Back">Sunshine Reggae Laid Back</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=There She Goes La's">There She Goes La's</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=When She Was Mine Lawson">When She Was Mine Lawson</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Wonder Woman Leaf">Wonder Woman Leaf</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Again Lenny Kravitz">Again Lenny Kravitz</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Always on the Run Lenny Kravitz">Always on the Run Lenny Kravitz</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Are You Gonna Go My Way Lenny Kravitz">Are You Gonna Go My Way Lenny Kravitz</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Dig In Lenny Kravitz">Dig In Lenny Kravitz</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=It Ain't Over 'til It's Over Lenny Kravitz">It Ain't Over 'til It's Over Lenny Kravitz</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Let Love Rule Lenny Kravitz">Let Love Rule Lenny Kravitz</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Hanging By A Moment Lifehouse">Hanging By A Moment Lifehouse</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Sick Cycle Carousel Lifehouse">Sick Cycle Carousel Lifehouse</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Boiler Limp Bizkit">Boiler Limp Bizkit</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Breakstuff Limp Bizkit">Breakstuff Limp Bizkit</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Eat You Alive Limp Bizkit">Eat You Alive Limp Bizkit</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=My Generation Limp Bizkit">My Generation Limp Bizkit</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=My Way Limp Bizkit">My Way Limp Bizkit</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Rollin' (Urban Assault Vehicle) Limp Bizkit">Rollin' (Urban Assault Vehicle) Limp Bizkit</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Faint Linkin Park">Faint Linkin Park</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=In The End Linkin' Park">In The End Linkin' Park</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=New Divide Linkin Park">New Divide Linkin Park</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Numb Linkin Park">Numb Linkin Park</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=One Step Closer Linkin' Park">One Step Closer Linkin' Park</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Somewhere I Belong Linkin Park">Somewhere I Belong Linkin Park</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=The Untitled (In The End) Linkin Park">The Untitled (In The End) Linkin Park</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=What I've Done Linkin Park">What I've Done Linkin Park</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Miserable Lit">Miserable Lit</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Heaven Live">Heaven Live</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=I Alone Live">I Alone Live</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Run Away Live">Run Away Live</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Simple Creed Live">Simple Creed Live</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Love Rears Its Ugly Head Living Colour">Love Rears Its Ugly Head Living Colour</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=!Audio\5. Zooi\Lordi -.mp3">!Audio\5. Zooi\Lordi -.mp3</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Sweet Home Alabama Lynyrd Skynyrd">Sweet Home Alabama Lynyrd Skynyrd</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Reunion M83">Reunion M83</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Baggy Trousers Madness">Baggy Trousers Madness</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Embarrassment Madness">Embarrassment Madness</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Night Boat to Cairo Madness">Night Boat to Cairo Madness</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=One Step Beyond Madness">One Step Beyond Madness</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Our House Madness">Our House Madness</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Dance With Somebody Mando Diao">Dance With Somebody Mando Diao</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=So Why So Sad Manic Street Preachers">So Why So Sad Manic Street Preachers</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Sex And Candy Marcy Playground">Sex And Candy Marcy Playground</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Lucky Strike Maroon 5">Lucky Strike Maroon 5</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=This Love Maroon 5">This Love Maroon 5</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Wake Up Call Maroon 5">Wake Up Call Maroon 5</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Won't Go Home Without You Maroon 5">Won't Go Home Without You Maroon 5</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Bent Matchbox Twenty">Bent Matchbox Twenty</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Unwell Matchbox Twenty">Unwell Matchbox Twenty</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=When We Collide Matt Cardle">When We Collide Matt Cardle</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Beautiful Imperfections Mattanja Joy Bradley">Beautiful Imperfections Mattanja Joy Bradley</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=I'd Do Anything For Love Meat Loaf">I'd Do Anything For Love Meat Loaf</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Like the Way I Do Melissa Etheridge">Like the Way I Do Melissa Etheridge</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Bitch Meredith Brooks">Bitch Meredith Brooks</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Enter Sandman Metallica">Enter Sandman Metallica</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Frantic Metallica">Frantic Metallica</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=One Metallica">One Metallica</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=St. Anger Metallica">St. Anger Metallica</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Whisky in the Jar Metallica">Whisky in the Jar Metallica</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Shake It Metro Station">Shake It Metro Station</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Kids MGMT">Kids MGMT</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Everywhere Michelle Branch">Everywhere Michelle Branch</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=God Gave Me Everything Mick Jagger">God Gave Me Everything Mick Jagger</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Ayo Technology Milow">Ayo Technology Milow</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Just a flirt Miss Montreal">Just a flirt Miss Montreal</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Burning The Ground Moke">Burning The Ground Moke</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=I'm A Believer Monkees">I'm A Believer Monkees</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=James Bond Theme (From Dr No) Monty Norman Orchestra">James Bond Theme (From Dr No) Monty Norman Orchestra</a></li>
                        <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=I Will Wait Mumford & Sons">I Will Wait Mumford & Sons</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Bliss Muse">Bliss Muse</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Hysteria Muse">Hysteria Muse</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Time Is Running Out Muse">Time Is Running Out Muse</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Uprising Muse">Uprising Muse</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=The Youth Of Today Musical Youth">The Youth Of Today Musical Youth</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Na Na Na (Na Na Na Na Na Na Na Na Na) My Chemical Romance">Na Na Na (Na Na Na Na Na Na Na Na Na) My Chemical Romance</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Popular Nada Surf">Popular Nada Surf</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Torn Natalie Imbruglia">Torn Natalie Imbruglia</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Anyplace Anywhere Anytime Nena & Kim Wilde">Anyplace Anywhere Anytime Nena & Kim Wilde</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Animal Neon Trees">Animal Neon Trees</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Gotta Be Somebody Nickelback">Gotta Be Somebody Nickelback</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=How You Remind Me Nickelback">How You Remind Me Nickelback</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=How You Remind Me Nickelback">How You Remind Me Nickelback</a></li>



                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=If Today Was Your Last Day Nickelback">If Today Was Your Last Day Nickelback</a></li>
                <li><a  href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Wonderwall Oasis">Wonderwall Oasis</a></li>

                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Rockstar Nickelback">Rockstar Nickelback</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Someday Nickelback">Someday Nickelback</a></li>-->
                <li><a data-file="bla.mp3" href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Just A Girl No Doubt">Just A Girl No Doubt</a></li>
                <li><a data-file="test.mp3" href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Smells Like Teen Spirit Nirvana">Smells Like Teen Spirit Nirvana</a></li>

                <!--<li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=L.I.F.E.G.O.E.S.O.N. Noah And The Wale">L.I.F.E.G.O.E.S.O.N. Noah And The Wale</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Whatever Didi Wants NOFX">Whatever Didi Wants NOFX</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Le Vent Nous Portera Noir Desir">Le Vent Nous Portera Noir Desir</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Because Novastar">Because Novastar</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Wrong Novastar">Wrong Novastar</a></li>
                <li><a data="test.mp3" href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Wonderwall Oasis">Wonderwall Oasis</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Up on the Downside Ocean Colour Scene">Up on the Downside Ocean Colour Scene</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Little Talks Of Monsters and Men">Little Talks Of Monsters and Men</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Just For Tonight One Night Only">Just For Tonight One Night Only</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Counting Stars One Republic">Counting Stars One Republic</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=All the Right Moves OneRepublic">All the Right Moves OneRepublic</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Secrets OneRepublic">Secrets OneRepublic</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Stop And Stare Onerepublic">Stop And Stare Onerepublic</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=According To You Orianthi">According To You Orianthi</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Somewhere Out There Our Lady Peace">Somewhere Out There Our Lady Peace</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=My Favorite Waste Of Time Owen Paul">My Favorite Waste Of Time Owen Paul</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Sleeping Awake P.O.D.">Sleeping Awake P.O.D.</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Nine in the Afternoon (radio mix) Panic! at the Disco">Nine in the Afternoon (radio mix) Panic! at the Disco</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Broken Home Papa Roach">Broken Home Papa Roach</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Last Resort Papa Roach">Last Resort Papa Roach</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Decode Paramore">Decode Paramore</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Alive Pearl Jam">Alive Pearl Jam</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Black Pearl Jam">Black Pearl Jam</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Just Breathe Pearl Jam">Just Breathe Pearl Jam</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Rockin' In The Free World Pearl Jam & Neil Young">Rockin' In The Free World Pearl Jam & Neil Young</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Bro Hymn Pennywise">Bro Hymn Pennywise</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=It Don't Matter To Me Phil Collins">It Don't Matter To Me Phil Collins</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=The Bitter End Placebo">The Bitter End Placebo</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Guitar Prince">Guitar Prince</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=500 Miles Proclaimers">500 Miles Proclaimers</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Blurry Puddle of Mudd">Blurry Puddle of Mudd</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=She Hates Me Puddle Of Mudd">She Hates Me Puddle Of Mudd</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Another One Bites The Dust Queen">Another One Bites The Dust Queen</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Go With The Flow Queens Of The Stone Age">Go With The Flow Queens Of The Stone Age</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Bad Day R.E.M.">Bad Day R.E.M.</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Driver 8 R.E.M.">Driver 8 R.E.M.</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Imitation Of Life R.E.M.">Imitation Of Life R.E.M.</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Losing My Religion R.E.M.">Losing My Religion R.E.M.</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Man on the Moon R.E.M.">Man on the Moon R.E.M.</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Shiny Happy People R.E.M">Shiny Happy People R.E.M</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=The One I Love R.E.M.">The One I Love R.E.M.</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=What's The Frequency Kenneth R.E.M.">What's The Frequency Kenneth R.E.M.</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Brother Racoon">Brother Racoon</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Welcome Home Radical Face">Welcome Home Radical Face</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Creep Radiohead">Creep Radiohead</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Karma Police Radiohead">Karma Police Radiohead</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Pyramid Song Radiohead">Pyramid Song Radiohead</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Street Spirit (Fade Out) Radiohead">Street Spirit (Fade Out) Radiohead</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Du Hast Rammstein">Du Hast Rammstein</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Engel Rammstein">Engel Rammstein</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Ich Will Rammstein">Ich Will Rammstein</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Sonne Rammstein">Sonne Rammstein</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=In The Shadows Rasmus">In The Shadows Rasmus</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Million Miles Reamonn">Million Miles Reamonn</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Supergirl Reamonn">Supergirl Reamonn</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Californication Red Hot Chili Peppers">Californication Red Hot Chili Peppers</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Can't Stop Red Hot Chili Peppers">Can't Stop Red Hot Chili Peppers</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Dani California Red Hot Chili Peppers">Dani California Red Hot Chili Peppers</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Desecration Smile Red Hot Chili Peppers">Desecration Smile Red Hot Chili Peppers</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Fortune Faded Red Hot Chili Peppers">Fortune Faded Red Hot Chili Peppers</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Hump De Bump Red Hot Chili Peppers">Hump De Bump Red Hot Chili Peppers</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Snow (Hey Oh) Red Hot Chili Peppers">Snow (Hey Oh) Red Hot Chili Peppers</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Soul to Squeeze Red Hot Chili Peppers">Soul to Squeeze Red Hot Chili Peppers</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Under The Bridge Red Hot Chili Peppers">Under The Bridge Red Hot Chili Peppers</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Place Your Hands Reef">Place Your Hands Reef</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Keep On Loving You REO Speedwagon">Keep On Loving You REO Speedwagon</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=One Life to the Next Rigby">One Life to the Next Rigby</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Her Diamonds Rob Thomas">Her Diamonds Rob Thomas</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=When Did Your Heart Go Missing Rooney">When Did Your Heart Go Missing Rooney</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Ain't Nobody Rufus & Chaka Khan">Ain't Nobody Rufus & Chaka Khan</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=New York, New York Ryan Adams">New York, New York Ryan Adams</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Awkward San Cisco">Awkward San Cisco</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Elvis Aint Dead Scouting For Girls">Elvis Aint Dead Scouting For Girls</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=I Cant Stand The Rain Seal">I Cant Stand The Rain Seal</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Careless Whisper Seether">Careless Whisper Seether</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Lullaby Shawn Mullins">Lullaby Shawn Mullins</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=All I Wanna Do Sheryl Crow">All I Wanna Do Sheryl Crow</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Soak Up The Sun Sheryl Crow">Soak Up The Sun Sheryl Crow</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Second Chance Shinedown">Second Chance Shinedown</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Freak Silverchair">Freak Silverchair</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Hedonism (Just Because You Feel Go Skunk Anansie">Hedonism (Just Because You Feel Go Skunk Anansie</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Just Say Yes (radio edit) Snow Patrol">Just Say Yes (radio edit) Snow Patrol</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Shut Your Eyes Snow Patrol">Shut Your Eyes Snow Patrol</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Hold The Line Sour Sister Dance Revolution">Hold The Line Sour Sister Dance Revolution</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Little Miss Can't Be Wrong Spin Doctors">Little Miss Can't Be Wrong Spin Doctors</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Two Princes Spin Doctors">Two Princes Spin Doctors</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=It's Been Awhile Staind">It's Been Awhile Staind</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Good Souls Starsailor">Good Souls Starsailor</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Have A Nice Day Stereophonics">Have A Nice Day Stereophonics</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Maybe Tomorrow Stereophonics">Maybe Tomorrow Stereophonics</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Bother Stone Sour">Bother Stone Sour</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Rock This Town Stray Cats">Rock This Town Stray Cats</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Falls Apart Sugar Ray">Falls Apart Sugar Ray</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=When It's Over Sugar Ray">When It's Over Sugar Ray</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Fat Lip Sum 41">Fat Lip Sum 41</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Chop Suey System Of A Down">Chop Suey System Of A Down</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=All the things she said Tatu">All the things she said Tatu</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=All We Know Taymir">All We Know Taymir</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Tribute Tenacious D">Tribute Tenacious D</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Gives You Hell The All-American Rejects">Gives You Hell The All-American Rejects</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Heart Attack The Asteroids Galaxy Tour">Heart Attack The Asteroids Galaxy Tour</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Little Black Submarines (Radio Edit) The Black Keys">Little Black Submarines (Radio Edit) The Black Keys</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Breeders-Cannonball The Breeders">Breeders-Cannonball The Breeders</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=London Calling The Clash">London Calling The Clash</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Rock The Casbah The Clash">Rock The Casbah The Clash</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Oh What A Night The Four Seasons">Oh What A Night The Four Seasons</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Chelsea Dagger The Fratellis">Chelsea Dagger The Fratellis</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Absolute The Fray">Absolute The Fray</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=How to Save a Life The Fray">How to Save a Life The Fray</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Never Say Never The Fray">Never Say Never The Fray</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Over My Head (Cable Car) The Fray">Over My Head (Cable Car) The Fray</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=You Found Me The Fray">You Found Me The Fray</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=45 The Gaslight Anthem">45 The Gaslight Anthem</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Mr. Brightside The Killers">Mr. Brightside The Killers</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Runaways The Killers">Runaways The Killers</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Spaceman The Killers">Spaceman The Killers</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Is It Me The Kooks">Is It Me The Kooks</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Pictures Of You The Last Goodnight">Pictures Of You The Last Goodnight</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Mrs. Robinson The Lemonheads">Mrs. Robinson The Lemonheads</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Ho Hey The Lumineers">Ho Hey The Lumineers</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=You're Gonna Go Far, Kid The Offspring">You're Gonna Go Far, Kid The Offspring</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Don't Stand So Close The Police">Don't Stand So Close The Police</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Every Breath You Take The Police">Every Breath You Take The Police</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Message In A Bottle (Single Version) The Police">Message In A Bottle (Single Version) The Police</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=What I Like About You The Romantics">What I Like About You The Romantics</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=The Seed (2.0) The Roots">The Seed (2.0) The Roots</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Breakeven The Script">Breakeven The Script</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Anarchy In The Uk The Sex Pistols">Anarchy In The Uk The Sex Pistols</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=No Way Down The Shins">No Way Down The Shins</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Fools Gold The Stone Roses">Fools Gold The Stone Roses</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=12 51 Strokes">12 51 Strokes</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Under Cover Of Darkness The Strokes">Under Cover Of Darkness The Strokes</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=That's Not My Name The Ting Tings">That's Not My Name The Ting Tings</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=The Lion Sleeps Tonight The Token">The Lion Sleeps Tonight The Token</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Bitter Sweet Symphony (Original) The Verve">Bitter Sweet Symphony (Original) The Verve</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Let's Dance To Joy Division (3FM Edit) The Wombats">Let's Dance To Joy Division (3FM Edit) The Wombats</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Never Let You Go Third Eye Blind">Never Let You Go Third Eye Blind</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Animal I Have Become Three Days Grace">Animal I Have Become Three Days Grace</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=I Hate Everything About You Three Days Grace">I Hate Everything About You Three Days Grace</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Angels on the Moon Thriving Ivory">Angels on the Moon Thriving Ivory</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Walk on the Ocean Toad the Wet Sprocket">Walk on the Ocean Toad the Wet Sprocket</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Monsoon Tokio Hotel">Monsoon Tokio Hotel</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Ready, Set, Go Tokio Hotel">Ready, Set, Go Tokio Hotel</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Another Love Tom Odell">Another Love Tom Odell</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=L'italiano Toto Cutugno">L'italiano Toto Cutugno</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Drive By Train">Drive By Train</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Hey Soul Sister Train">Hey Soul Sister Train</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Something More Train">Something More Train</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Baby One More Time (Live) Travis">Baby One More Time (Live) Travis</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Sing Travis">Sing Travis</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Bang A Gong Get It On T-Rex">Bang A Gong Get It On T-Rex</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=I Follow Rivers (Live@Giel!) Triggerfinger">I Follow Rivers (Live@Giel!) Triggerfinger</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Sun (3FM Edit) Two Door Cinema Club">Sun (3FM Edit) Two Door Cinema Club</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Undercover Martyn Two Door Cinema Club">Undercover Martyn Two Door Cinema Club</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Beautiful Day U2">Beautiful Day U2</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Elevation (Tomb Raider Mix) U2">Elevation (Tomb Raider Mix) U2</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Get On Your Boots U2">Get On Your Boots U2</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=I Will Follow U2">I Will Follow U2</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=New Year's Day U2">New Year's Day U2</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=New Year's Day (Single Version) U2">New Year's Day (Single Version) U2</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Pride (In The Name Of Love) U2">Pride (In The Name Of Love) U2</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Stuck In A Moment You Can't Get Out Of U2">Stuck In A Moment You Can't Get Out Of U2</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Sunday Bloody Sunday U2">Sunday Bloody Sunday U2</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Sunday Bloody Sunday U2">Sunday Bloody Sunday U2</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Vertigo U2">Vertigo U2</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Walk On U2">Walk On U2</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Where the Streets Have No Name U2">Where the Streets Have No Name U2</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Window in the Skies U2">Window in the Skies U2</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Cats In The Cradle Ugly Kid Joe">Cats In The Cradle Ugly Kid Joe</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Runnin' With The Devil Van Halen">Runnin' With The Devil Van Halen</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Baby Get Higher Van Velzen">Baby Get Higher Van Velzen</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Deep Van Velzen">Deep Van Velzen</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Love Song Van Velzen">Love Song Van Velzen</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Burning Heart Vandenberg">Burning Heart Vandenberg</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=A Thousand Miles Vanessa Carlton">A Thousand Miles Vanessa Carlton</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Everything You Want Vertical Horizon">Everything You Want Vertical Horizon</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Wicked Way Waylon">Wicked Way Waylon</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Teenage dirtbag Weatus">Teenage dirtbag Weatus</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Buddy Holly Weezer">Buddy Holly Weezer</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Hash Pipe Weezer">Hash Pipe Weezer</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Freedom Wham">Freedom Wham</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Teenage Dirtbag Wheatus">Teenage Dirtbag Wheatus</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=7 Nation Army White Stripes">7 Nation Army White Stripes</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Salamander Will & The People">Salamander Will & The People</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Lion In the Morning Sun Will and the People">Lion In the Morning Sun Will and the People</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=I Wanna Be Your Man Willy Moon">I Wanna Be Your Man Willy Moon</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=All I Need Within Temptation">All I Need Within Temptation</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Frozen Within Temptation">Frozen Within Temptation</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Mother Earth Within Temptation">Mother Earth Within Temptation</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Running Up That Hill Within Temptation">Running Up That Hill Within Temptation</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=What Have You Done Within Temptation & Keith Caputo">What Have You Done Within Temptation & Keith Caputo</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Making Plans For Nigel Xtc">Making Plans For Nigel Xtc</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=My Body Young the Giant">My Body Young the Giant</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Playmate Of The Year Zebrahead">Playmate Of The Year Zebrahead</a></li>
                <li><a href="http://en.wikipedia.org/w/index.php?title=Special%3ASearch&profile=default&fulltext=Search&search=Baila (Sexy Thing) Zucchero Sugar Fornaciari">Baila (Sexy Thing) Zucchero Sugar Fornaciari</a></li>-->
            </ol>
        </div>
        <script src="js/jquery-1.11.0.js"></script>
        <script src="js/lodash.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>