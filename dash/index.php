<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exypnos : Dashboard</title>
  <?php require_once '../content/head.php'; ?>
</head>
<body>
  <?php
  require_once '../tasks/checkSession.php';
  require_once '../content/navBar.php';
  require_once '../config/config.php';
  ?>
  <div class="container mt-4 mb-4">
    <h1>Exypnos</h1>
    <p>
      Welcome to our dashboard!. Here you can find useful information &
      publish new posts.
    </p>
    <hr>

    <div class="row">
      <div class="container">
        <div id="accordion">
          <div class="card">
            <div class="card-header" data-toggle="collapse" href="#collapseOne">
              <a class="card-link" data-toggle="collapse" href="#collapseOne">
                Instructions for New Authors
              </a>
            </div>
            <div id="collapseOne" class="collapse" data-parent="#accordion">
              <div class="card-body">
                <h5>මූලික උපදෙස්:-</h5>
                <ol>
                  <li>කිසියම් ප්‍රවෘත්තියක් ලිවීමට පෙර, එම ප්‍රවෘත්තිය මීට පෙර වෙන අයක් විසින් ලියා නොමැති බව තහවුරු කරගත යුතුය. ඒ සඳහා ඉහල Menu Bar එකේ ඇති Posts වෙත ගොස් Post List පහසුකම භාවිතා කරන්න.</li>
                  Exypnos අපගේ බලාපොරොත්තුව Tech News නැතහොත් තාක්ෂණය හා සම්බන්ධ ප්‍රවෘත්ති හැකි ඉක්මනින් පාඨකයන් වෙත ලබා දීමයි. එබැවින් හැකිතාක් ප්‍රවෘත්ති සම්බන්ද ලිපි ලිවීමට උත්සහ කරන්න.<li>ප්‍රවෘත්තිය ලිවිය යුත්තේ සාරාංශ ගත කොට, හැකි උපරිමයෙන් <b>කෙටි</b> ප්‍රවෘත්තියක් ලැබෙන ලෙසටය. යම් අන්තර්ජාල වෙබ් පිටුවක සම්පූර්ණ අන්තර්ගතය එලෙසින්ම පරිවර්තනය කිරීම <b>අවශ්‍ය නොවේ!</b> ප්‍රවෘත්තිය ලිවීම සඳහා ලබා දී ඇති අකුරු ප්‍රමාණය ප්‍රමාණවත් අතර, ඔබේ ප්‍රවෘත්තිය එම ඉඩ ඉක්මවා යන්නේ නම් ඔබ එම ප්‍රවෘත්තිය තවත් සාරාංශ ගත&nbsp;කර කෙටි කළ යුතුය.&nbsp;</li>
                </ol>
                <br />
                <h5>මාතෘකාව (Title) :-</h5>
                <ol>
                  <li>ඔබගේ මාතෘකාව, අදාළ ප්‍රවෘත්තිය සැකෙවින් විස්තර කරන, පාඨකයා කෙරෙහි ප්‍රවෘත්තිය කියවීමට කුතුහලයක් ඇති කරවන මාතෘකාවක් විය යුතුය.</li>
                  <li>මාතෘකාව අනවශ්‍ය ලෙස දීර්ඝ කර නොගෙන <b>හැකි තරම් කෙටියෙන්</b> ඉදිරිපත් කළ යුතුය.</li>
                </ol>
                <br />
                <h5>කෙටි හැඳින්වීම (Short Description) :-</h5>
                <ol>
                  <li>මෙම කොටස ඔබගේ ප්‍රවෘත්තියේ මාතෘකාව සමඟ ප්‍රධාන පිටුවේ (Home) දර්ශණය වේ. එබැවින්, මෙම කොටස ඔබ ලියන ලද ප්‍රවෘත්තියේ අන්තර්ගතය පිළිබඳව පාඨකයා හට අවබෝධයක් ඇති කිරීමට සමත් වන&nbsp;<b>කෙටි</b> පාඨයක් විය යුතුය. මෙම කොටස ද, හැකි පමණ <b>කෙටියෙන්</b> ඉදිරිපත් කළ යුතු වේ.</li>
                </ol>
                <br />
                <h5>ප්‍රවෘත්තිය (Post):-</h5>
                <ol>
                  <li>මෙම කොටස ලිවීම සඳහා ඔබට HTML කේත භාවිතා කළ හැක. සාමාන්‍ය HTML පිටුවක අඩංගු වන සියළු කේත (&lt;head&gt;, &lt;title&gt;,&lt;body&gt; ආදී) මෙහි <b>ඇතුළත් කළ යුතු නැත!</b> &lt;body&gt; ටැග් එක ඇතුළත භාවිතා කරන ටැග්ස් පමණක් ඔබට භාවිතා කළ හැක. මෙය ඔබගේ ප්‍රවෘත්තිය අඩංගු web පිටුවේ body එක ලෙස උපකල්පනය කරගන්න. Javascript ආදිය භාවිතය වලංගු නොවේ.</li>
                  <li>හැකි සෑම විටකදීම videos ඇතුළත් කිරීමේදී embedded ආකාරය භාවිතා කරන්න. විශේෂයෙන් ඔබ <b>YouTube video එකක් ඇතුළත් කරයි නම්,</b> අනිවාර්යයෙන්ම Embedded code එකක් භාවිතා කරන්න. මෙම කේතය ලබා ගැනීමට YouTube අඩවියේ Share බොත්තම ඔබා Embed ආකාරය තෝරාගෙන එතැනින් සපයන කේත පේළි කිහිපය copy කර ප්‍රවෘත්තිය ලියන කොටුවේ paste කරන්න.<br />උදා:- <br />&lt;iframe width="560" height="315" src="https://www.youtube.com/embed/E67Klqw2H-E" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen&gt;&lt;/iframe&gt;</li>
                </ol>
                <ol>
                  <li>ඔබට සබැඳියක් (link) ඇතුළත් කිරීමට අවශ්‍ය නම් &lt;a&gt; ටැග් එක භාවිතා කළ යුතුය.<br />උදා:-<br />&lt;a href="https://www.google.com/"&gt;Google Search&lt;/a&gt;<br /><br /></li>
                  <li>ඔබ ලියන ප්‍රවෘත්තියේ preview එකක් ඔබට ඔබේ දකුණු පසින් දර්ශනය වේ. ඔබ ඇතුළත් කළ HTML කේත නිසි පරිදි ක්‍රියාත්මක වේදැයි එතැනින් පරීක්ෂා කරගත හැක.</li>
                  <li>ප්‍රවෘත්තිය සරල ලෙස ඉදිරිපත් කළ යුතුය, එසේම හැකි පමණ අක්ෂර වින්‍යාස දෝෂ අවම කළ යුතුය. විශේෂයෙන්ම ඉංග්‍රීසි වචන වල අකුරු නිවැරදි අක්ෂර වින්‍යාසයෙන් ඉදිරිපත් කළ යුතුය. යම් කිසි පුද්ගලයෙකුගේ, සමාගමක හෝ කිසියම් අයිතමයක නාමයක් ඉංග්‍රීසි බසින් ලියන්නේ නම් අනිවාර්යයෙන්ම පළමු අකුර කැපිටල් අකුරු ලෙස ලිවිය යුතුය. (උදාහරණ:- Google, Microsoft, Android Linux, Mark Zuckerberg)</li>
                  <li>ඔබ ලියනා ප්‍රවෘත්ති වල අවසානයේ ඔබේ නම ඇතුළත් කළ යුතු නැත. එය ස්වයංක්‍රීයව ඇතුළත් වේ.</li>
                </ol>
                <br />
                <h5><u>පිංතූර ඇතුළත් කිරීම සඳහා පොදු උපදෙස්.</u></h5>
                <ol>
                  <li><b>හැකි සෑම විටම</b> මෙම රූපය 500KB ට අඩු විය යුතුය. අනවශ්‍ය ප්‍රමාණයේ විශාල රූප නිසා පාඨකයන්ගේ mobile data වැය විය හැක. එය මෙම app එක අතහැර දැමීමට පවා හේතුවක් විය හැක.</li>
                  <li>අප විසින් image hosting නොකරන අතර ඒ සඳහා වැඩි ඉඩ ප්‍රමාණයක් වැය වේ. මේ දක්වාම මෙමඟින් කිසිම ආදායමක් අප විසින් උපයා නොගන්නා බැවින් එය අනවශ්‍ය වියදමකි. එබැවින් ඔබගේ ප්‍රවෘත්තිය සඳහා ඔබ ඇතුළත් කරන පිංතූර <b>ඔබට හැකි තැනක host කළ යුතුය.</b> (වඩා ඵලදායි hosting සේවාවක් ලෙස Google සමාගම හඳුන්වාදිය හැක. Google Blogger හෝ Google Photos හි ඔබේ පින්තූර නොමිලේ host කළ හැක.) ඉන්පසුව අදාළ පින්තූර වල <b>direct link</b>&nbsp;ලබාගත යුතුය.</li>
                  <li>ඔබ පෙර පියවරේදී ලබාගත් link එක ඇතුළත් කිරීම සඳහා Exypnos dashboard පිටුවේ ඒ සඳහා දී ඇති ඉඩ ප්‍රමාණය මදි නම්, <a href="https://bitly.com/" target="_blank">bitly.com</a> වැනි URL කෙටි කරන සේවාවක් භාවිතා කර එම link එක කෙටි කරගත යුතුය. ඉන් පසු, එම කෙටි URLඑක භාවිතා කළ හැක. <b>දීර්ඝ link භාවිතා කිරීම App එක මන්දගාමී වීමට හේතුවිය හැක.</b></li>
                </ol>
                <br />
                <h5>කවර පිංතූරය (Cover Image URL):-</h5>
                <ol>
                  <li>ඔබේ ප්‍රවෘත්තිය සමඟ <b>ප්‍රධාන පිටුවේ</b> දර්ශනය වන්නේ මෙම රූපයයි. එබැවින් මෙම රූපය පාඨක ආරක්ෂණය දිනාගන්නා රූපයක් විය යුතුය.</li>
                  <li>මෙම පිංතූරය සඳහා සෑම විටම පළල වැඩි, උස අඩු, එනම් <b>landscape ආකාරයේ රූප භාවිතා කළ යුතුය.</b> Portrait අකාරයේ රූප භාවිතය නිසා ප්‍රධාන පිටුවේ ඉඩ අනවශ්‍ය ලෙස වැයවේ.</li>
                  <li><b>පිංතූර ඇතුළත් කිරීම සඳහා&nbsp;වූ පොදු උපදෙස් පිළිපදින්න!</b></li>
                </ol>
                <h5>පිංතූර 1, හා 2 (Card Image 1&amp;2 URL:-</h5>
                <ol>
                  <li>මේවා ඔබගේ ප්‍රවෘත්තිය අවසානයේ දර්ශනය වන රූප වේ. එබැවින් ප්‍රවෘත්තියට අදාළ රූප දෙකක් මේ සඳහා එකතු කළ හැක.</li>
                  <li><b>පිංතූර ඇතුළත් කිරීම සඳහා&nbsp;වූ පොදු උපදෙස් පිළිපදින්න!</b></li>
                </ol>
                <br />
                <h5>පසුවදන :-</h5>
                <ol>
                  <li>ඔබ යම් ප්‍රවෘත්තියක් ඇතුළත් කළ පසුව, එය සාර්ථක ලෙස ඇතුළත් වූයේ නම්, Alert එකක් මඟින් එය ඔබට පෙන්වනු ඇත. එලෙස සාර්ථක ලෙස ප්‍රවෘත්තිය ඇතුළත් <b>නොවූයේ නම්,</b> හෝ <b>Error එකක් දර්ශනය වූයේ නම්,</b> කරුණාකර අපගේ developer කෙනෙක් වෙත දැනුම්දෙන්න.</li>
                  <li>අලුත් ප්‍රවෘත්තියක් ඇතුළත් කළ සැනින් ඔබ Exypnos App එක විවෘත කර ඔබ ඇතුළත් කළ ප්‍රවෘත්තිය නිසි ආකාරව ඇතුළත් වී ඇත්ද යන වග පරීක්ෂා කර බලන්න. ඔබ ඇතුළත් කළ පිංතූර දර්ශණය වේ දැයි තහවුරු කරගන්න. යම් වෙනස්කමක් කිරීමට අවශ්‍ය නම්, ඔබට එය Dashboard එකට log වීමෙන් එය සිදු කළ හැක.</li>
                  <li>Exypnos වෙත පුවත් ඇතුළත් කරන ඔබට බෙහෙවින් ස්තුතියි.</li>
                </ol>
              </div>
            </div>
          </div>
          <div class="card mt-3">
            <div class="card-header" data-toggle="collapse" href="#collapseTwo">
              <a class="card-link" data-toggle="collapse" href="#collapseTwo">
                Most Viewed Posts (Last 10 days)
              </a>
            </div>
            <div id="collapseTwo" class="collapse" data-parent="#accordion">
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Post Title</th>
                      <th>Views</th>
                      <th>Author</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT p.title, pv.views, a.uname FROM post p, post_view pv, author a WHERE p.post_id = pv.post_id AND p.author_id = a.author_id ORDER BY views DESC LIMIT 10";

                    $result = mysqli_query($link, $sql);

                    while ($row = mysqli_fetch_array($result)) {
                      echo '<tr>';
                      echo '<td>' . $row['title'] . '</td>';
                      echo '<td>' . $row['views'] . '</td>';
                      echo '<td>' . $row['uname'] . '</td>';
                      echo '</tr>';
                    }

                    mysqli_free_result($result);
                    mysqli_close($link);

                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
