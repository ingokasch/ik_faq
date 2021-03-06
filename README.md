# TYPO3-FAQ-Extension (ik_faq)

----

### What is it?

ik_faq is a TYPO3 extension for managing and displaying a FAQ section on your website.

***This extension is developed under GNU V3 for TYPO3 9.5.x*** *and might not be compatible with older versions.*

### What am I able to do with it?

You can set up multiple categories (incl. category image(s)) and associate question/answere pairs to it (multiple categories for each question/answere pair are supported).

Each question and answere can have multiple images and links.

The included templates, CSS and JavaScript files provide a minimalistically styled frontend output. The output in the frontend can easily be modified and tailored to your needs.

### Behind the curtain (*technical stuff, you don't need to understand this to use the extension*)

The extension is based on Extbase (namespaces etc.) and uses Fluid for templating. File relations are done using the [TYPO3 FAL](http://docs.typo3.org/TYPO3/FileAbstractionLayerReference/). All CSS files are generated via the CSS Preprocessor [SASS](http://sass-lang.com/). The original SASS files are also included.

All CSS and JavaScript files are also minified for faster rendering. All minifications etc. are done using the streaming build system [gulp.js](http://gulpjs.com).
The used gulpfile.js and composer.json ([composer](https://getcomposer.org/)) are also included in the download.

***Sidenote: I recommand you include all CSS and JavaScript code in your existing files to have it all in one place.***

More on that in the section **Included CSS & JavaScript** below.

---

# Getting started

### 1. Download
Download the extension. Extract and copy the folder "ik_faq" in your **typo3conf** folder.

**OR**

Clone this repository into your **typo3conf** folder:
```
$ git clone git://github.com/ingokasch/ik_faq.git
```

### 2. Activate the extension
Login to your TYPO3 backend, go to the extension manager and active the extension named 
**FAQ - Frequently Asked Questions // Ingo Kasch**

### 3. Include static files
Use the template tool and select the page containing your page or ext+ template from the page tree. Make sure you have **Info/Modify** selected in the dropdown at the top and click on **Edit the whole template record**.

Select the tab **includes** and add the extension files **FAQ (ik_faq)** to the selected items list.

Save the changes ;-)

### 4. Configuration
Create a new sysfolder ("FAQ" for example). This folder will contain all data related to the FAQs (categories, questions/answers, links etc.).

Use the **Constant Editor** to edit the **PLUGIN.TX_FAQ** constants.
Set the value of **Default storage PID** in the section "Others" to the id of the sysfolder that you have created right before.

That is it. Now the extension knows where to find the needed data.

---

# How to use it
### 1. Category
Use the **List tool** on the FAQ sysfolder and create a new record of typo **Category** (in the section *FAQ - Frequently Asked Questions // Ingo Kasch*)

Your category needs a title and can have one, multiple or no images related to it.
If you have created any answere/question entries, you are able to relate them to the category using the **Entries** tab.

The following fields are available:

Fieldname        |Tab           | Function
------------- |-------------| -----
Title      | General | Title of the category
Images      | General      |  Images related to the category

### 2. Entry (answers/questions)
Use the **List tool** on the FAQ sysfolder and create a new record of typo **Entry** (in the section *FAQ - Frequently Asked Questions // Ingo Kasch*)

The following fields are available:

Fieldname        |Tab           | Function
------------- |-------------| -----
Title      | General | Used as identifier in the select box in a category
Question      | Question      |  Text of your question (RTE)
Images | Question      |    Images related to the question
Answere      | Answere      |  Text of your answere (RTE)
Images | Answere      |    Images related to the answere
Links      | Links      |  Links related to the answere (TYPE: Link)
Categories      | Categories      |  Categories in which the entry is listed

### 3. Links
Use the **List tool** on the FAQ sysfolder and create a new record of typo **Link** (in the section *FAQ - Frequently Asked Questions // Ingo Kasch*)

The following fields are available:

Fieldname        |Tab           | Function
------------- |-------------| -----
Name      | General | Used as identifier in the select box in an entry
Href      | General      |  The URL
Target | General      |    Dropdown to choose where/how the link should be opened (<a  **target="{valueOfTarget}"**...)
Entries | Entries      |    Images related to the question

### 4. Plugins (Frontend)
The Extension comes with 2 plugins **FAQ - Category navigation** and **FAQ - Show category entries**.

Plugin        |Function
------------- |-------------
FAQ - Category navigation      | Renders a navigation of all categories
FAQ - Show category entries      | Displays all entries for a selected category

To use a plugin choose the **Page tool** and select a page from your page tree. Add a new record of type **General Plugin** (found under the *Plugins* tab).

In the new record go to the tab *Plugin* and choose one of the two plugins in the dropdown list.
Repeat the same step for the second plugin.

DONE! Make sure to clear your TYPO3 Caches now and preview your page in the frontend :) 

---

### Included CSS & JavaScript
I want to provide a extension that is focused on functionality rater that a fancy styled frontend. The provided CSS and JavaScript files are just to give you an idea on how the frontend could work and look like.

All files are included via Typoscript and can easily be removed if you want to use your own CSS/JS (**setup.ts**):
```
page.includeCSS {
	ik_faq		= typo3conf/ext/ik_faq/Resources/Public/css/ik_faq.min.css
}
```
```
page.includeJSFooter {
	ik_faq		= typo3conf/ext/ik_faq/Resources/Public/js/ik_faq.js
}
```

---
### Languages
The extension currently supports the following languages in the front- and backend:

- English (*default*)
- German

---

### Bug or feature?
If there are any bugs or any features you would like me to add to this extension, feel free to open an issue on [this Github page](https://github.com/ingokasch/ik_faq/issues).

---

## License

GNU GENERAL PUBLIC LICENSE V3
