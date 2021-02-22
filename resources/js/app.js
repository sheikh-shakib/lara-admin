require('./bootstrap');

require('tinymce/themes/silver');

import tinymce from 'tinymce';
tinymce.init({
    selector:'textarea#inputCategoryContent',
    height:400,
    skin:false,
    custom_css:false
     
});