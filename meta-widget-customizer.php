<?php

/*
Plugin Name: Meta Widget Customizer
Plugin URI: http://benohead.com
Description: Adds a customizable meta widget for the sidebar
Author: Henri Benoit
Version: 0.6.1
Author URI: http://benohead
License: GPL2

 Copyright 2012  Henri Benoit (henri.benoit@gmail.com)
 All rights reserved.

 This program is distributed under the GNU General Public License, Version 2,
 June 1991. Copyright (C) 1989, 1991 Free Software Foundation, Inc., 51 Franklin
 St, Fifth Floor, Boston, MA 02110, USA

 THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
 ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
 ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*/

class Meta_Widget_Customizer
{

    function register()
    {
        wp_register_style('meta-widget-customizer-style', plugins_url('meta-widget-customizer.css', __FILE__));
        wp_enqueue_style('meta-widget-customizer-style');
        wp_enqueue_script('jquery');
        wp_register_script('meta-widget-customizer-script', plugins_url('meta-widget-customizer.js', __FILE__));
        wp_enqueue_script('meta-widget-customizer-script');
        wp_register_sidebar_widget('meta_widget_customizer', 'Meta Widget Customizer', array('Meta_Widget_Customizer', 'widget'));
        wp_register_widget_control('meta_widget_customizer', 'Meta Widget Customizer', array('Meta_Widget_Customizer', 'control'));
    }

    function widget($args)
    {
        $data = get_option('meta_widget_customizer');
        echo $args['before_widget'];
        echo $args['before_title'] . $data['title'] . $args['after_title'];
        ?>
        <ul>
        <?php if (!empty($data['translate'])) { ?>
            <form method="get" action="http://translate.google.com/translate">
                <input type="hidden" value="1" name="layout">
                <input type="hidden" value="1" name="eotf">
                <input type="hidden" value="n" name="js">
                <input type="hidden" value="auto" name="sl">
                <select name="tl" onchange="this.form.submit();">
                    <option value="" selected="">Translate</option>
                    <option value="af">Afrikaans [Afrikaans]</option>
                    <option value="sq">Shqip [Albanian]</option>
                    <option value="ar">عربي [Arabic]</option>
                    <option value="hy">Հայերէն [Armenian]</option>
                    <option value="az">آذربایجان دیلی [Azerbaijani]</option>
                    <option value="eu">Euskara [Basque]</option>
                    <option value="be">Беларуская [Belarusian]</option>
                    <option value="bg">Български [Bulgarian]</option>
                    <option value="ca">Català [Catalan]</option>
                    <option value="zh-CN">中文简体 [Chinese (Simplified)]</option>
                    <option value="zh-TW">中文繁體 [Chinese (Traditional)]</option>
                    <option value="hr">Hrvatski [Croatian]</option>
                    <option value="cs">Čeština [Czech]</option>
                    <option value="da">Dansk [Danish]</option>
                    <option value="nl">Nederlands [Dutch]</option>
                    <option value="en">English [English]</option>
                    <option value="et">Eesti keel [Estonian]</option>
                    <option value="tl">Filipino [Filipino]</option>
                    <option value="fi">Suomi [Finnish]</option>
                    <option value="fr">Français [French]</option>
                    <option value="gl">Galego [Galician]</option>
                    <option value="ka">ქართული [Georgian]</option>
                    <option value="de">Deutsch [German]</option>
                    <option value="el">Ελληνικά [Greek]</option>
                    <option value="ht">Kreyòl ayisyen [Haitian Creole]</option>
                    <option value="iw">עברית [Hebrew]</option>
                    <option value="hi">हिन्दी [Hindi]</option>
                    <option value="hu">Magyar [Hungarian]</option>
                    <option value="is">Íslenska [Icelandic]</option>
                    <option value="id">Bahasa Indonesia [Indonesian]</option>
                    <option value="ga">Gaeilge [Irish]</option>
                    <option value="it">Italiano [Italian]</option>
                    <option value="ja">日本語 [Japanese]</option>
                    <option value="ko">한국어 [Korean]</option>
                    <option value="lv">Latviešu [Latvian]</option>
                    <option value="lt">Lietuvių kalba [Lithuanian]</option>
                    <option value="mk">Македонски [Macedonian]</option>
                    <option value="ms">Malay [Malay]</option>
                    <option value="mt">Malti [Maltese]</option>
                    <option value="no">Norsk [Norwegian]</option>
                    <option value="fa">فارسی [Persian]</option>
                    <option value="pl">Polski [Polish]</option>
                    <option value="pt">Português [Portuguese]</option>
                    <option value="ro">Română [Romanian]</option>
                    <option value="ru">Русский [Russian]</option>
                    <option value="sr">Српски [Serbian]</option>
                    <option value="sk">Slovenčina [Slovak]</option>
                    <option value="sl">Slovensko [Slovenian]</option>
                    <option value="es">Español [Spanish]</option>
                    <option value="sw">Kiswahili [Swahili]</option>
                    <option value="sv">Svenska [Swedish]</option>
                    <option value="th">ไทย [Thai]</option>
                    <option value="tr">Türkçe [Turkish]</option>
                    <option value="uk">Українська [Ukrainian]</option>
                    <option value="ur">اردو [Urdu]</option>
                    <option value="vi">Tiếng Việt [Vietnamese]</option>
                    <option value="cy">Cymraeg [Welsh]</option>
                    <option value="yi">ייִדיש [Yiddish]</option>
                </select>
                <input type="hidden" value="<?php echo(site_url($_SERVER['REQUEST_URI'])); ?>" name="u">
            </form>
        <?php
        }
        if (!empty($data['username']) && (is_user_logged_in())) {
            global $current_user;
            get_currentuserinfo();
            ?>
            <li><a
                href="<?php echo site_url("/wp-admin/profile.php"); ?>"><?php echo "$current_user->display_name"; ?></a>
            </li><?php
        }
        if ((!empty($data['logintabs'])) && (!is_user_logged_in())) {
            ?>
            <div id="tabs_container">
                <ul id="tabs">
                    <?php
                    $active_exists = false;
                    ?>
                    <?php if (!is_user_logged_in()) { ?>
                        <li<?php if (!$active_exists) echo ' class="active"';
                        $active_exists = true; ?>><a href="#login"><?php _e('Login'); ?></a></li>
                    <?php
                    }
                    if (get_option('users_can_register') && (!is_user_logged_in())) {
                        ?>
                        <li<?php if (!$active_exists) echo ' class="active"';
                        $active_exists = true; ?>><a href="#register"><?php _e('Register'); ?></a></li>
                    <?php
                    }
                    if (!is_user_logged_in()) {
                        ?>
                        <li<?php if (!$active_exists) echo ' class="active"';
                        $active_exists = true; ?>><a href="#lostpassword"><?php _e('Lost password'); ?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div id="tabs_content_container">
                <?php if (!is_user_logged_in()) { ?>
                    <div id="login" class="tab_content" style="display: block;">
                        <form name="loginform" id="loginform" action="<?php echo wp_login_url(); ?>" method="post">
                            <p>
                                <label for="user_login"><?php _e('Username'); ?><br/>
                                    <input type="text" name="log" id="user_login" class="input" value="" size="20"
                                           tabindex="10"/></label>
                            </p>

                            <p>
                                <label for="user_pass"><?php _e('Password'); ?><br/>
                                    <input type="password" name="pwd" id="user_pass" class="input" value="" size="20"
                                           tabindex="20"/></label>
                            </p>

                            <p class="forgetmenot"><label for="rememberme"><input name="rememberme" type="checkbox"
                                                                                  id="rememberme" value="forever"
                                                                                  tabindex="90"/> <?php _e('Remember Me'); ?>
                                </label></p>

                            <p class="submit">
                                <input type="hidden" name="redirect_to"
                                       value="<?php echo(site_url($_SERVER['REQUEST_URI'])); ?>"/>
                                <input type="submit" name="wp-submit" id="wp-submit" class="button-primary"
                                       value="<?php _e('Log In'); ?>" tabindex="100"/>
                                <input type="hidden" name="testcookie" value="1"/>
                            </p>
                        </form>
                    </div>
                <?php
                }
                if (get_option('users_can_register') && (!is_user_logged_in())) {
                    ?>
                    <div id="register" class="tab_content">
                        <form name="registerform" id="registerform"
                              action="<?php echo site_url(); ?>/wp-login.php?action=register" method="post">
                            <p>
                                <label for="user_login"><?php _e('Username'); ?><br/>
                                    <input type="text" name="user_login" id="user_login" class="input" value=""
                                           size="20" tabindex="10"/></label>
                            </p>

                            <p>
                                <label for="user_email"><?php _e('E-mail'); ?><br/>
                                    <input type="email" name="user_email" id="user_email" class="input" value=""
                                           size="25" tabindex="20"/></label>
                            </p>

                            <p id="reg_passmail"><?php _e('A password will be e-mailed to you.'); ?></p>
                            <br class="clear"/>
                            <input type="hidden" name="redirect_to"
                                   value="<?php echo(site_url($_SERVER['REQUEST_URI'])); ?>"/>

                            <p class="submit"><input type="submit" name="wp-submit" id="wp-submit"
                                                     class="button-primary" value="<?php _e('Register'); ?>"
                                                     tabindex="100"/></p>
                        </form>
                    </div>
                <?php
                }
                if (!is_user_logged_in()) {
                    ?>
                    <div id="lostpassword" class="tab_content">
                        <form name="lostpasswordform" id="lostpasswordform"
                              action="<?php echo wp_lostpassword_url(); ?>" method="post">
                            <p>
                                <label for="user_login"><?php _e('Username or E-mail:'); ?><br/>
                                    <input type="text" name="user_login" id="user_login" class="input" value=""
                                           size="20" tabindex="10"/></label>
                            </p>
                            <input type="hidden" name="redirect_to"
                                   value="<?php echo(site_url($_SERVER['REQUEST_URI'])); ?>"/>

                            <p class="submit"><input type="submit" name="wp-submit" id="wp-submit"
                                                     class="button-primary" value="<?php _e('Get New Password'); ?>"
                                                     tabindex="100"/></p>
                        </form>
                    </div>
                <?php } ?>
            </div> <?php
        } else {
            if (!empty($data['register'])) {
                wp_register();
            }
            if (!empty($data['login'])) {
                ?>
                <li><?php wp_loginout();
            }
            if (!empty($data['lostpassword']) && (!is_user_logged_in())) {
                ?>
                <li><a href="<?php echo wp_lostpassword_url(get_permalink()); ?>" title="Lost Password">Lost
                    Password</a></li><?php
            }
        }
        if (!empty($data['editlink']) && (is_user_logged_in()) && is_page()) {
            edit_post_link(__('Edit page'), '<li>', '</li>');
        }
        if (!empty($data['editlink']) && (is_user_logged_in()) && is_single()) {
            edit_post_link(__('Edit post'), '<li>', '</li>');
        }
        if (!empty($data['adminlink']) && (is_user_logged_in()) && current_user_can("manage_options")) {
            ?>
            <li><a href="<?php echo site_url("/wp-admin/"); ?>">Dashboard</a></li><?php
        }
        if (!empty($data['xhtmlvalid']) && (is_user_logged_in()) && current_user_can("manage_options")) {
            ?>
            <li><a href="http://validator.w3.org/check?uri=referer" title="Valid XHTML 1.0 Transitional">Valid XHTML</a>
            </li><?php
        }
        if (!empty($data['entriesrss'])) {
            ?>
            <li><a href="<?php bloginfo('rss2_url'); ?>"
                   title="<?php echo esc_attr(__('Syndicate this site using RSS 2.0')); ?>"><?php _e('Entries <abbr title="Really Simple Syndication">RSS</abbr>'); ?></a>
            </li><?php
        }
        if (!empty($data['commentsrss'])) {
            ?>
            <li><a href="<?php bloginfo('comments_rss2_url'); ?>"
                   title="<?php echo esc_attr(__('The latest comments to all posts in RSS')); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr>'); ?></a>
            </li><?php
        }
        if (!empty($data['wordpressorg'])) {
            ?>
            <li><a href="http://wordpress.org/"
                   title="<?php echo esc_attr(__('Powered by WordPress, state-of-the-art semantic personal publishing platform.')); ?>">WordPress.org</a>
            </li><?php
        }
        if (!empty($data['googlesearch'])) {
            ?>
            <form method="get" id="googlesitesearch" action="http://www.google.com/search">
                <table border="0" cellpadding="0">
                    <tr>
                        <td>
                            <input type="text" id="googlesitesearchtext" name="q" maxlength="255" value=""/>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="font-size:75%">
                            <input type="submit" id="googlesitesearchsubmit" value="<?php _e('Search'); ?>"/>
                            <input type="checkbox" id="googlesitesearchcheck" name="sitesearch"
                                   value="<?php echo site_url(); ?>" checked/><?php _e('only this site'); ?><br/>
                        </td>
                    </tr>
                </table>
            </form>
        <?php
        }
        if ((!empty($data['select_category'])) && ($data['select_category'] != -1)) {
            wp_list_bookmarks(array('title_li' => '', 'categorize' => '0', 'category' => $data['select_category'], 'category_before' => '<li>', 'category_after' => '</li>'));
        }
        if ((!empty($data['feedurl'])) && ($data['feedurl'] != -1)) {
            $noOfFeedItems = 5;
            if ((!empty($data['feeditems'])) && ($data['feeditems'] > 0)) {
                $noOfFeedItems = $data['feeditems'];
            }
            include_once(ABSPATH . WPINC . '/feed.php');
            $rss = fetch_feed($data['feedurl']);
            if (!is_wp_error($rss)) {
                $noOfFeedItems = $rss->get_item_quantity($noOfFeedItems);
                $rss_items = $rss->get_items(0, $noOfFeedItems);
                if ($noOfFeedItems > 0) {
                    foreach ($rss_items as $item) {
                        ?>
                        <li><a
                            href='<?php echo esc_url($item->get_permalink()); ?>'><?php echo esc_html($item->get_title()); ?></a>
                        </li><?php
                    }
                }
            }
        }
        wp_meta(); ?>
        </ul>
        <?php
        echo $args['after_widget'];
    }

    function control()
    {
        $data = get_option('meta_widget_customizer');
        ?>
        <p><label for="meta_widget_customizer_title"><?php echo __('Title'); ?></label><input
                id="meta_widget_customizer_title" name="meta_widget_customizer_title" class="widefat" type="text"
                value="<?php echo $data['title']; ?>"/></p>
        <p>
            <input id="meta_widget_customizer_username" name="meta_widget_customizer_username" type="checkbox"
                   value="1" <?php checked('1', $data['username']); ?> /><label
                for="meta_widget_customizer_username"><?php echo __('User name'); ?></label><br>
            <input id="meta_widget_customizer_translate" name="meta_widget_customizer_translate" type="checkbox"
                   value="1" <?php checked('1', $data['translate']); ?> /><label
                for="meta_widget_customizer_translate"><?php echo __('Translate'); ?></label><br>
            <input id="meta_widget_customizer_logintabs" name="meta_widget_customizer_logintabs" type="checkbox"
                   value="1" <?php checked('1', $data['logintabs']); ?> /><label
                for="meta_widget_customizer_logintabs"><?php echo __('Login tabs'); ?></label><br>
            <input id="meta_widget_customizer_register" name="meta_widget_customizer_register" type="checkbox"
                   value="1" <?php checked('1', $data['register']); ?> /><label
                for="meta_widget_customizer_register"><?php echo __('Register'); ?></label><br>
            <input id="meta_widget_customizer_login" name="meta_widget_customizer_login" type="checkbox"
                   value="1" <?php checked('1', $data['login']); ?> /><label
                for="meta_widget_customizer_login"><?php echo __('Log in/out'); ?></label><br>
            <input id="meta_widget_customizer_lostpassword" name="meta_widget_customizer_lostpassword" type="checkbox"
                   value="1" <?php checked('1', $data['lostpassword']); ?> /><label
                for="meta_widget_customizer_lostpassword"><?php echo __('Lost password'); ?></label><br>
            <input id="meta_widget_customizer_editlink" name="meta_widget_customizer_editlink" type="checkbox"
                   value="1" <?php checked('1', $data['editlink']); ?> /><label
                for="meta_widget_customizer_editlink"><?php echo __('Edit link'); ?></label><br>
            <input id="meta_widget_customizer_adminlink" name="meta_widget_customizer_adminlink" type="checkbox"
                   value="1" <?php checked('1', $data['adminlink']); ?> /><label
                for="meta_widget_customizer_adminlink"><?php echo __('Admin link'); ?></label><br>
            <input id="meta_widget_customizer_xhtmlvalid" name="meta_widget_customizer_xhtmlvalid" type="checkbox"
                   value="1" <?php checked('1', $data['xhtmlvalid']); ?> /><label
                for="meta_widget_customizer_xhtmlvalid"><?php echo __('XHTML validator link'); ?></label><br>
            <input id="meta_widget_customizer_entriesrss" name="meta_widget_customizer_entriesrss" type="checkbox"
                   value="1" <?php checked('1', $data['entriesrss']); ?> /><label
                for="meta_widget_customizer_entriesrss"><?php echo __('Entries RSS'); ?></label><br>
            <input id="meta_widget_customizer_commentsrss" name="meta_widget_customizer_commentsrss" type="checkbox"
                   value="1" <?php checked('1', $data['commentsrss']); ?> /><label
                for="meta_widget_customizer_commentsrss"><?php echo __('Comments RSS'); ?></label><br>
            <input id="meta_widget_customizer_wordpressorg" name="meta_widget_customizer_wordpressorg" type="checkbox"
                   value="1" <?php checked('1', $data['wordpressorg']); ?> /><label
                for="meta_widget_customizer_wordpressorg"><?php echo __('WordPress.org'); ?></label><br>
            <input id="meta_widget_customizer_googlesearch" name="meta_widget_customizer_googlesearch" type="checkbox"
                   value="1" <?php checked('1', $data['googlesearch']); ?> /><label
                for="meta_widget_customizer_googlesearch"><?php echo __('Google search'); ?></label>
        <p>Show also links from this category:</p>
        <?php wp_dropdown_categories(array('hide_empty' => 0, 'id' => 'meta_widget_customizer_select_category', 'name' => 'meta_widget_customizer_select_category', 'selected' => $data['select_category'], 'show_count' => 1, 'show_option_none' => __('None'), 'taxonomy' => 'link_category')); ?>
        <p>Show also items from this feed:</p>
        <label for="meta_widget_customizer_feedurl"><?php echo __('Feed URL'); ?></label><input
        id="meta_widget_customizer_feedurl" name="meta_widget_customizer_feedurl" type="text" class="widefat"
        value="<?php echo($data['feedurl']); ?>"/><br>
        <label for="meta_widget_customizer_feeditems"><?php echo __('Number of feed items'); ?></label><input
        id="meta_widget_customizer_feeditems" name="meta_widget_customizer_feeditems" type="text" size="2"
        value="<?php echo($data['feeditems']); ?>"/><br>
        </p>
        <?php
        if (isset($_POST['meta_widget_customizer_title'])) {
            $data['title'] = attribute_escape($_POST['meta_widget_customizer_title']);
            $data['username'] = attribute_escape($_POST['meta_widget_customizer_username']);
            $data['translate'] = attribute_escape($_POST['meta_widget_customizer_translate']);
            $data['logintabs'] = attribute_escape($_POST['meta_widget_customizer_logintabs']);
            $data['register'] = attribute_escape($_POST['meta_widget_customizer_register']);
            $data['login'] = attribute_escape($_POST['meta_widget_customizer_login']);
            $data['lostpassword'] = attribute_escape($_POST['meta_widget_customizer_lostpassword']);
            $data['editlink'] = attribute_escape($_POST['meta_widget_customizer_editlink']);
            $data['adminlink'] = attribute_escape($_POST['meta_widget_customizer_adminlink']);
            $data['xhtmlvalid'] = attribute_escape($_POST['meta_widget_customizer_xhtmlvalid']);
            $data['entriesrss'] = attribute_escape($_POST['meta_widget_customizer_entriesrss']);
            $data['commentsrss'] = attribute_escape($_POST['meta_widget_customizer_commentsrss']);
            $data['wordpressorg'] = attribute_escape($_POST['meta_widget_customizer_wordpressorg']);
            $data['googlesearch'] = attribute_escape($_POST['meta_widget_customizer_googlesearch']);
            $data['select_category'] = attribute_escape($_POST['meta_widget_customizer_select_category']);
            $data['feedurl'] = attribute_escape($_POST['meta_widget_customizer_feedurl']);
            $data['feeditems'] = attribute_escape($_POST['meta_widget_customizer_feeditems']);
            update_option('meta_widget_customizer', $data);
        }
    }

    function activate()
    {
        // Add default values
        $defaults = array('title' => 'Meta',
            'username' => 0,
            'translate' => 0,
            'logintabs' => 0,
            'register' => 1,
            'login' => 1,
            'lostpassword' => 0,
            'editlink' => 0,
            'adminlink' => 0,
            'xhtmlvalid' => 0,
            'entriesrss' => 1,
            'commentsrss' => 1,
            'wordpressorg' => 1,
            'googlesearch' => 0,
            'customlinks' => NULL,
            'feedurl' => NULL,
            'feeditems' => 0,
        );
        if (!get_option('meta_widget_customizer')) {
            add_option('meta_widget_customizer', $defaults);
        }
        /*	    else {
                     update_option('meta_widget_customizer' , $defaults);
                } */
    }

    function deactivate()
    {
        delete_option('meta_widget_customizer');
    }

    function admin_init()
    {
        register_setting('meta_widget_customizer_plugin_options', 'meta_widget_customizer');
    }

    function add_options_page()
    {
        add_options_page('Meta Widget Customizer Options Page', 'Meta Widget Customizer', 'manage_options', __FILE__, array('Meta_Widget_Customizer', 'render_option_form'));
    }

    function render_option_form()
    {
        ?>
        <div class="wrap">
            <div class="icon32" id="icon-options-general"><br></div>
            <h2>Meta Widget Customizer</h2>

            <form method="post" action="options.php">
                <?php
                settings_fields('meta_widget_customizer_plugin_options');
                $data = get_option('meta_widget_customizer');
                ?>

                <p>The following links are always available in the widget administration:</p>
                <input id="meta_widget_customizer_username" name="meta_widget_customizer[username]" type="checkbox"
                       value="1" <?php if (isset($data['username'])) {
                    checked('1', $data['username']);
                } ?> /><label for="meta_widget_customizer_username"><?php echo __('User name'); ?></label><br>
                <input id="meta_widget_customizer_translate" name="meta_widget_customizer[translate]" type="checkbox"
                       value="1" <?php if (isset($data['translate'])) {
                    checked('1', $data['translate']);
                } ?> /><label for="meta_widget_customizer_translate"><?php echo __('Translate'); ?></label><br>
                <input id="meta_widget_customizer_logintabs" name="meta_widget_customizer[logintabs]" type="checkbox"
                       value="1" <?php if (isset($data['logintabs'])) {
                    checked('1', $data['logintabs']);
                } ?> /><label for="meta_widget_customizer_logintabs"><?php echo __('Login tabs'); ?></label><br>
                <input id="meta_widget_customizer_register" name="meta_widget_customizer[register]" type="checkbox"
                       value="1" <?php if (isset($data['register'])) {
                    checked('1', $data['register']);
                } ?> /><label for="meta_widget_customizer_register"><?php echo __('Register'); ?></label><br>
                <input id="meta_widget_customizer_login" name="meta_widget_customizer[login]" type="checkbox"
                       value="1" <?php if (isset($data['login'])) {
                    checked('1', $data['login']);
                } ?> /><label for="meta_widget_customizer_login"><?php echo __('Log in/out'); ?></label><br>
                <input id="meta_widget_customizer_lostpassword" name="meta_widget_customizer[lostpassword]"
                       type="checkbox" value="1" <?php if (isset($data['lostpassword'])) {
                    checked('1', $data['lostpassword']);
                } ?> /><label for="meta_widget_customizer_lostpassword"><?php echo __('Lost password'); ?></label><br>
                <input id="meta_widget_customizer_editlink" name="meta_widget_customizer[editlink]" type="checkbox"
                       value="1" <?php if (isset($data['editlink'])) {
                    checked('1', $data['editlink']);
                } ?> /><label for="meta_widget_customizer_editlink"><?php echo __('Edit link'); ?></label><br>
                <input id="meta_widget_customizer_adminlink" name="meta_widget_customizer[adminlink]" type="checkbox"
                       value="1" <?php if (isset($data['adminlink'])) {
                    checked('1', $data['adminlink']);
                } ?> /><label for="meta_widget_customizer_adminlink"><?php echo __('Admin link'); ?></label><br>
                <input id="meta_widget_customizer_xhtmlvalid" name="meta_widget_customizer[xhtmlvalid]" type="checkbox"
                       value="1" <?php if (isset($data['xhtmlvalid'])) {
                    checked('1', $data['xhtmlvalid']);
                } ?> /><label
                    for="meta_widget_customizer_xhtmlvalid"><?php echo __('XHTML validator link'); ?></label><br>
                <input id="meta_widget_customizer_entriesrss" name="meta_widget_customizer[entriesrss]" type="checkbox"
                       value="1" <?php if (isset($data['entriesrss'])) {
                    checked('1', $data['entriesrss']);
                } ?> /><label for="meta_widget_customizer_entriesrss"><?php echo __('Entries RSS'); ?></label><br>
                <input id="meta_widget_customizer_commentsrss" name="meta_widget_customizer[commentsrss]"
                       type="checkbox" value="1" <?php if (isset($data['commentsrss'])) {
                    checked('1', $data['commentsrss']);
                } ?> /><label for="meta_widget_customizer[commentsrss]"><?php echo __('Comments RSS'); ?></label><br>
                <input id="meta_widget_customizer_wordpressorg" name="meta_widget_customizer[wordpressorg]"
                       type="checkbox" value="1" <?php if (isset($data['wordpressorg'])) {
                    checked('1', $data['wordpressorg']);
                } ?> /><label for="meta_widget_customizer_wordpressorg"><?php echo __('WordPress.org'); ?></label><br>
                <input id="meta_widget_customizer_googlesearch" name="meta_widget_customizer[googlesearch]"
                       type="checkbox" value="1" <?php if (isset($data['googlesearch'])) {
                    checked('1', $data['googlesearch']);
                } ?> /><label for="meta_widget_customizer_googlesearch"><?php echo __('Google search'); ?></label>

                <p>Additionally you can define a link category which links will also be shown in the meta box.</p>

                <p>Show also links from this category:</p>
                <?php
                wp_dropdown_categories(array('hide_empty' => 0, 'name' => 'meta_widget_customizer[select_category]', 'selected' => $data['select_category'], 'show_count' => 1, 'show_option_none' => __('None'), 'taxonomy' => 'link_category'));
                ?>
                <p>You can add a new category where you'll store the links you want to be able to display in the meta
                    box <a href="<?php echo site_url("/wp-admin/edit-tags.php?taxonomy=link_category"); ?>">here</a></p>

                <p>Show also items from this feed:</p>
                <label for="meta_widget_customizer[feedurl]"><?php echo __('Feed URL'); ?></label><input
                    id="meta_widget_customizer_feedurl" name="meta_widget_customizer[feedurl]" type="text" size="50"
                    value="<?php echo($data['feedurl']); ?>"/><br>
                <label for="meta_widget_customizer[feeditems]"><?php echo __('Number of feed items'); ?></label><input
                    id="meta_widget_customizer_feeditems" name="meta_widget_customizer[feeditems]" type="text" size="2"
                    value="<?php echo($data['feeditems']); ?>"/><br>

                <p class="submit">
                    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>"/>
                </p>
            </form>
        </div>
    <?php
    }

    function plugin_action_links($links)
    {
        $my_links = '<a href="' . get_admin_url() . 'options-general.php?page=meta-widget-customizer/meta-widget-customizer.php">' . __('Settings') . '</a>';
        array_unshift($links, $my_links);
        return $links;
    }

}

add_action("widgets_init", array('Meta_Widget_Customizer', 'register'));
register_activation_hook(__FILE__, array('Meta_Widget_Customizer', 'activate'));
register_deactivation_hook(__FILE__, array('Meta_Widget_Customizer', 'deactivate'));
add_action('admin_init', array('Meta_Widget_Customizer', 'admin_init'));
add_action('admin_menu', array('Meta_Widget_Customizer', 'add_options_page'));
add_filter('plugin_action_links_' . plugin_basename(__FILE__), array('Meta_Widget_Customizer', 'plugin_action_links'));
?>