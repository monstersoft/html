<!DOCTYPE HTML>
<html>
    <head>
    <style type="text/css">
        html {
            font-family: 'Helvetica-Neue', 'Helvetica', 'Arial';
        }
    </style>
        <title>Download File JS example</title>
        <script src="../src/download.js"></script>
    </head>
    <body>
        <h1>
            DownloadJS demo page
        </h1>
        <h2>
            Intelligent solution for files downloading in JavaScript
        </h2>
        <p>
            Why DownloadJS?
        </p>
        <ul>
            <li>
                Uses virtual link element and HTML5 <b>download</b> attribute to initiate downloading ignoring content-type
            </li>
            <li>
                Avoids blank screens after file starts downloading in Chrome, Safari
            </li>
            <li>
                Initiates downloading from server via ?download query
            </li>
        </ul>
        <p><strong>Do not forget to <a href="#" onclick="document.getElementById('hint').style.display = 'block'; return false;">set Content-disposition headers</a> in order to work properly in IE and FF.</strong></p>
        <div id="hint" style="display: none; color: #999999">
            <p>Easiest way to configure headers via Apache is to set <strong>Header set Content-Disposition "attachment"</strong> for files you want to be downloaded.</p>
            <p>So .htaccess can look like:<br><br>
                &lt;FilesMatch "\.(zip|rar)$"&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;Header set Content-Disposition attachment<br>
                &lt;/FilesMatch&gt;
            </p>
        </div>
        <p id="downloadLabel"></p>
        <script>
            var secondsBeforeDownloading = 5;
            var timerInterval = setInterval('setDownloadText()', 1000);
            var setDownloadText = function() {
                var label = document.getElementById('downloadLabel');
                if (secondsBeforeDownloading === 0){
                    label.innerHTML = 'Poehali !!!';
                    downloadFile('./file.todownload');
                    clearInterval(timerInterval);
                } else {
                    label.innerHTML = 'Download will start in ' + secondsBeforeDownloading + ' seconds...';
                    secondsBeforeDownloading--;
                }
            }
        </script>

        <!-- AddThis Button BEGIN -->
        <div class="addthis_toolbox addthis_default_style ">
        <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
        <a class="addthis_button_tweet"></a>
        <a class="addthis_button_pinterest_pinit"></a>
        <a class="addthis_counter addthis_pill_style"></a>
        </div>
        <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4ea2f9164143bcfb"></script>
        <!-- AddThis Button END -->
    </body>
</html>