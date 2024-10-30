=== Logo Showcase Creative ===
Contributors: conceptcorners 
Tags: conceptcorners,logos, logoshowcase,slider logo showcase plugin, Logo brand, illustrate, logo exhibit, display case, show window, logo pattern, logo reveal, iconic, advertise, brandish, bring to view, logo showcase plugin, logo grid, logo slider, company, company logo, branding
Requires at least: 3.1
Tested up to: 4.9.2
Requires PHP:5.5
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==
Logo Showcase Creative is a best way to add logo in your website with grid and slider designs.

= Here is the shortcode example =
<code>[ccs-logoshowcase]</code>

= If you want to display Logos by category then use this short code =
<code>[ccs-logoshowcase]</code>

= Complete shortcode with all parameters =
<code>[ccs-logoshowcase limit="10" category="1,5,9" design="design-1" grid="3" order="desc" orderby="post_date" link_target="self" exclude_post="4,5,6" posts="7,8,9" image_size="full" type="grid" dots="true" arrows="true" loop="true" autoplay="true" slides_column="4" slides_scroll="1"]</code>


= Use Following parameters with shortcode <code>[ccs-logoshowcase type="grid"]</code> =

* **limit:**
[ccs-logoshowcase type="grid" limit="5"] ( Display 5 Logo on your website )

* **Display by category**
[ccs-logoshowcase type="grid" category="category_ID"] ( Display Logos by their category ID )

* **Grid:**
[ccs-logoshowcase type="grid" grid="3"] (Display no of logo columns in Logos grid design )

* **link_target:**
[ccs-logoshowcase type="grid" link_target="blank"] (Open link on the same Tab OR other Tab. Values are "blank" and "self") 

* **show_title:**
[ccs-logoshowcase type="grid" show_title="false"] (ie show logo title or not. By default value is "false" Values are "true" and "false") 

* **image_size:**
[ccs-logoshowcase type="grid" image_size="full"] (ie set image size of logo. By default value is "full" Values are "original, large, medium, thumbnail") 

* **order:**
[ccs-logoshowcase type="grid" order="desc"] (Designates the ascending or descending order of the 'orderby' parameter. Defaults to 'DESC'. Values are "DESC" and "ASC") 

* **orderby :**
[ccs-logoshowcase type="grid" orderby="post_date"] (Sort retrieved posts by parameter. Defaults to 'date (post_date)'. One or more options can be passed. 'none',ID','author','title','name',rand',date')


= Use Following parameters with shortcode <code>[ccs-logoshowcase type="slider"]</code> =

* **Slide columns for Logo slider:**
[ccs-logoshowcase type="slider" slides_column="2"] (Display no of columns in Logos slider design )

* **Number of Logos slides at a time:**
[ccs-logoshowcase type="slider" slides_scroll="2"] (Controls number of Logos slide at a time)

* **Pagination and arrows:**
[ccs-logoshowcase type="slider" dots="false" arrows="false"] ( show slider dots and arrows. )

* **Autoplay and Autoplay Interval:**
[ccs-logoshowcase type="slider" autoplay="true"] ( slide your logo automatically. )
[ccs-logoshowcase type="slider" autoplay_interval="100"] ( slide logo after a duration. )

* **Logo Showcase Slide Speed:**
[ccs-logoshowcase type="slider" speed="3000"] ( logo sliding speed. )

* **Loop:**
[ccs-logoshowcase type="slider" loop="true"] ( Display slider in Loop OR not : You can use "true" OR "false")

= Template code is =
<code><?php echo do_shortcode('[ccs-logoshowcase]'); ?></code>

== Installation ==

1. Upload the 'Logo Showcase Creative' folder to the '/wp-content/plugins/' directory.
2. Activate the "Logo Showcase Creative" list plugin through the 'Plugins' menu in WordPress.
3. Add a new page and add this short code 
<code>[ccs-logoshowcase]</code>
4. Template code is 

<code><?php echo do_shortcode('[ccs-logoshowcase]'); ?></code>

== Screenshots ==

1. Logo Listing.
2. Add Logo item where you can add Logo, Logo title, Logo category, and Logo custom link.
3. Add logo categories and also you can see shortcode for each category so, just copy the shortcode and paste it in any page or post.

== Changelog ==

= 2.0 =
* [*] Resolved some css issue.
* [+] Added custom logo link.
* [+] Added 3 new designs.
* [*] Changed textdomain.
* [*] Added category shortcode column

= 1.0 =
* Initial release


== Upgrade Notice ==

= 2.0 =
* [*] Resolved some css issue.
* [+] Added custom logo link.
* [+] Added 3 new designs.
* [*] Changed textdomain.
* [*] Added category shortcode column

= 1.0 =
* Initial release.