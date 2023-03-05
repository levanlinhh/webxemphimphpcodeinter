<?php
$comments_method             = film_config('comments_method');
$facebook_comment_appid     = film_config('facebook_comment_appid');
$disqus_short_name             = film_config('disqus_short_name');
if (($comments_method == 'both' || $comments_method == 'facebook') && $facebook_comment_appid != '') :
?>
    <!-- facebook comments -->
    <div class="row">
        <div class="col-md-12">
            <h2 class="border"><?php echo trans('facebook_comments'); ?></h2>
            <div class="fb-comments" style="background-color:#fff;" data-href="<?php echo $PAGE_URL; ?>" data-width="1140" data-numposts="5"></div>
            <div id="fb-root"></div>
            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v14.0&appId=<?php echo film_config('facebook_comment_appid'); ?>&autoLogAppEvents=1" nonce="zZvJ5M1p"></script>
        </div>
    </div>
    <!-- END facebook comments -->
<?php endif; ?>
<?php if ($comments_method == 'both' || $comments_method == 'disqus') : ?>
    <!-- disqus comments -->
    <div class="row">
        <div class="col-md-12">
            <div id="disqus_thread"></div>
            <script>
                var disqus_config = function() {
                    this.page.url = "<?php echo $PAGE_URL; ?>"; // Replace PAGE_URL with your page's canonical URL variable
                    this.page.identifier = "<?php echo $PAGE_IDENTIFIER; ?>"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                };
                (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document,
                        s = d.createElement('script');
                    s.src = 'https://<?php echo $disqus_short_name; ?>.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
            <script id="dsq-count-scr" src="//<?php echo $disqus_short_name; ?>.disqus.com/count.js" async></script>
        </div>
    </div>
    <!-- END disqus comments -->
<?php endif; ?>