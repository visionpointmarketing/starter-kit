<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $secondary_menu_heading: The title of the menu used by the secondary links.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['branding']: Items for the branding region.
 * - $page['header']: Items for the header region.
 * - $page['navigation']: Items for the navigation region.
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see omega_preprocess_page()
 */
?>
<div class="l-page">
  <div id="header-wrapper">
    <header>
      <div class="container">
        <div id="header-row" class="row">
          <div id="logo-wrapper" class="span2">
            <?php if (!empty($logo)): ?>
              <a class="logo" href="http://www.uncc.edu/" title="<?php print t('Home'); ?>">
                <img src="<?php print $logo; ?>" alt="UNC Charlotte Logo" />
              </a>
            <?php endif; ?>
          </div> <!--/#logo-wrapper -->
          <?php if ($site_name): ?>
            <div id="branding" class="span7">
              <div id="site-name-wrapper">
                <div id="site-name">
                  <?php if ($subbrand_text && $subbrand_link): ?>
                    <?php if ($title): ?>
                      <a class="site-title" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
                    <?php else:  /* Use h1 when the content title is empty */ ?>
                      <h1 id="site-name-title">
                        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
                      </h1>
                    <?php endif; ?>
                    <p id="subbrand-link" class="hidden-phone">
                      <a href="<?php print $subbrand_link; ?>" title="<?php print $subbrand_text; ?>"><?php print $subbrand_text; ?></a>
                    </p>
                  <?php else: /* No subbrand given */ ?>
                    <?php if ($title): ?>
                      <a class="site-title no-subbrand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
                    <?php else:  /* Use h1 when the content title is empty */ ?>
                      <h1 id="site-name-title">
                        <a class="site-title no-subbrand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
                      </h1>
                    <?php endif; ?>
                  <?php endif; ?>
                </div> <!-- /#site-name -->
              </div> <!-- /#site-name-wrapper -->
            </div> <!-- /#branding -->
          <?php endif; ?>
          <div id="header-utility" class="span3 hidden-phone">
            <?php print $header_utility; ?>
          </div> <!--/#header-utility-->
        </div> <!--/#header-row -->
      </div> <!--/.container -->
      <div class="l-header-third">
        <div class="container">
          <?php print render($page['header_third']); ?>
        </div>
      </div>
    </header>
  </div>
  <div class="l-main">
    <div id="content-region1" class="content-region"><?php print render($page['content_header']); ?></div>
    <div id="content-region2" class="content-region"><?php print render($page['above_content']); ?></div>
    <div id="content-region3" class="content-region"><?php print render($page['below_content']); ?></div>
    <div id="content-region4" class="content-region"><?php print render($page['content_footer']); ?></div>
  </div>
  <footer class="l-footer" role="contentinfo">
    <?php print render($page['footer_first']); ?>
  <div id="footer">
    <div id="footer-container" class="container">
      <div class="row">
        <div id="static-footer" class="span12">
          <div class="row hidden-phone">
            <div id="utility-bar" class="span12">
              <div class="row">
                <div id="footer-links" class="span9">
                  <ul>
                    <li><img style="margin-top: 7px;" alt="Small UNC Charlotte Crown Logo" src="/sites/all/themes/unc_charlotte4/img/crown-small.png"></li>
                    <li><a title="Alerts and Advisories at UNC Charlotte" target="_blank" href="http://www.unccharlottealerts.com">Alerts</a></li>
                    <li><a title="Jobs at UNC Charlotte" href="https://jobs.uncc.edu">Jobs</a></li>
                    <li><a title="Make a gift to UNC Charlotte" href="http://www.uncc.edu/makeagift">Make a Gift</a></li>
                    <li><a title="Directions to UNC Charlotte" href="http://www.uncc.edu/directions">Maps / Directions</a></li>
                    <li><a title="View this page as text only" href="https://textonly.uncc.edu?1343005729">Text Only</a></li>
                    <li><img height="20" width="20" style="display: inline-block; margin: 7px 6px 0 0; vertical-align: middle;" title="" alt="accessibility icon" src="/sites/all/themes/unc_charlotte4/img/accessibility-icon.png"><a style="vertical-align: top;" title="Accessibility resources at UNC Charlotte" href="http://www.uncc.edu/accessibility">Accessibility</a></li>
                  </ul>
                </div> <!--/#footer-links-->
                <div id="footer-search" class="span3">
                  <form action="http://search.uncc.edu/website/" method="get" id="utility-search" onsubmit="var searchbox = document.getElementById('utility-search-input'); if (searchbox.value == 'Search uncc.edu' || searchbox.value == '') { searchbox.value=''; searchbox.focus(); return false; }"><input type="image" src="/sites/all/themes/unc_charlotte4/img/utility-edu-search-mag.png" id="utility-search-button"><input type="text" name="q" value="Search uncc.edu" size="25" maxlength="100" title="" onclick="if (this.value == 'Search uncc.edu') { this.value = ''; }" id="utility-search-input"></form>
                </div> <!--/#footer-search-->
              </div> <!--/.row-->
            </div> <!--#utility-bar -->
          </div> <!--/.row-->
          <div class="row">      
            <div id="footer-bottom" class="span12">
              <div class="row">
                <div id="footer-name" class="span6 hidden-phone">
                  <p style="font-weight: bold; text-transform: none !important; font-family: arial, helvetica, sans-serif !important; color: #00703c; font-size: 1.13em; margin-bottom: 5px;">
                    <a style="color: #00703c;" title="www.uncc.edu" href="http://www.uncc.edu">The University of North Carolina at Charlotte</a>
                  </p>
                  <p style="line-height: 10px;">9201 University City Blvd, Charlotte, NC 28223-0001 <b>&middot;</b> 704-687-8622</p>
                  <p style="line-height: 10px;">&copy; <?php print date('Y'); ?> UNC Charlotte | All Rights Reserved | <a style="text-decoration: underline;" title="" href="http://legal.uncc.edu/termsofuse">Terms of Use</a> | <a style="text-decoration: underline;" title="" href="http://legal.uncc.edu/policies">University Policies</a></p>
                </div> <!-- #footer-name -->
                <div id="footer-follow" class="span3 offset3">
                  <p id="social-title">Follow UNC Charlotte</p>
                  <div class="facebook social-icons"><a target="_blank" title="Facebook" href="http://www.facebook.com/UNCCharlotte"><img height="20" width="20" alt="Facebook" src="/sites/all/themes/unc_charlotte4/img/1x1.gif"></a></div>
                  <div class="blog social-icons"><a target="_blank" title="Blogger" href="http://unccltnews.blogspot.com/"><img height="20" width="20" alt="Blogger" src="/sites/all/themes/unc_charlotte4/img/1x1.gif"></a></div>
                  <div class="twitter social-icons"><a target="_blank" title="Twitter" href="http://twitter.com/UNCCharlotte"><img height="20" width="20" alt="Twitter" src="/sites/all/themes/unc_charlotte4/img/1x1.gif"></a></div>
                  <div class="flickr social-icons"><a target="_blank" title="Flickr" href="http://www.flickr.com/photos/stakeyourclaim/sets"><img height="20" width="20" alt="Flickr" src="/sites/all/themes/unc_charlotte4/img/1x1.gif"></a></div>
                  <div class="youtube social-icons"><a target="_blank" title="YouTube" href="http://www.youtube.com/unccharlottevideo"><img height="20" width="20" alt="YouTube" src="/sites/all/themes/unc_charlotte4/img/1x1.gif"></a></div>
                </div> <!-- #footer-follow -->
              </div> <!--/.row-->
            </div> <!-- #footer-bottom -->
          </div> <!--/.row-->
        </div> <!--/#static-footer -->
      </div> <!--/.row-->
    </div> <!--/#footer-container -->
  </div> <!--/#footer-->
  </footer>
</div>
<script type="text/javascript" src="sites/all/themes/unc_charlotte4/libraries/peeler/js/peeler.js"></script>
<script type="text/javascript">
  var peeler = new Peeler();
  peeler.bind();
</script>