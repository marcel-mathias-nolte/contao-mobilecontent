# Mobile Detection and Content (contao-mobile-detection-content)

Based on bugbuster/mobiledetection-bundle and derhaeuptling/contao-mobilecontent.
I merged some functionalities of both bundles as I couldn't get a good detection of mobile devices with derhauptlings bundle alone.

This extension lets you show or hide specific articles, content elements and frontend modules on mobile or desktop devices.
Image fields are extended – you can now add an different image for the mobile devices.


It works out of the box by recognizing the visitor user agent and displaying the appropriate content. <br>
For use with CDN that caches the pages you may want to enable a separate mobile domain though (see explanation below).

The extension is compatible with Contao 4.4 and newwer. 

## Toggle the content

To toggle the content you can either edit the element settings or simply use the icons available in the list view:

![](docs/list-icons.png)

## Different mobile image

To use a different image for mobile devices check `Different mobile image` on any elment with an image.

![](docs/mobile-image.png)

## Insert tags

#### ifmobile […] endifmobile, ifndesktop […] endifndesktop

The content between the start and and tag is skipped if it appears on a desktop page.

#### ifdesktop […] endifdesktop, ifnmobile […] endifnmobile

The content between the start and and tag is skipped if it appears on a mobile page.

## Body classes

The body is extended with the class desktop, tablet or phone.