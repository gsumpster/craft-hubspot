/**
 * Hubspot Fieldtype plugin for Craft CMS
 *
 * Form Field JS
 *
 * @author    George Sumpster
 * @copyright Copyright (c) 2022 George Sumpster
 * @link      gsumpster.com
 * @package   HubspotFieldtype
 * @since     0.1.0HubspotFieldtypeForm
 */

 ;(function ( $, window, document, undefined ) {

    var pluginName = "HubspotFieldtypeForm",
        defaults = {
        };

    // Plugin constructor
    function Plugin( element, options ) {
        this.element = element;

        this.options = $.extend( {}, defaults, options) ;

        this._defaults = defaults;
        this._name = pluginName;

        this.init();
    }

    Plugin.prototype = {

        init: function() {
            var _this = this;

            $(function () {
                _this.updatePreview(_this.options.initialValue);
            });
        },

        updatePreview: function(value) {
            var _this = this;

                if (value) {
                    _this.element.querySelector(".hsff-preview").innerHTML = "";
                    let form = _this.options.forms.find((f) => f.guid === value);

                    // <p class="hsff-preview-details__modified">Last Modified At: ${new Date(form.updatedAt).toLocaleString()}</p> 
                    const detailsCode = `
                        <div class="hsff-preview-details">
                            <p class="hsff-preview-details__title">${form.isPublished && `<span class="hsff-preview-details__status"></span>`}${form.name}</p>

                            <div>
                                <a class="hsff-preview-details__edit" target="_blank" href="https://app.hubspot.com/forms/${form.portalId}/editor/${form.guid}/edit/form">Edit in Hubspot</a>
                                ${!_this.options.disablePreview && `<button type="button" id="${_this.options.name}-preview" class="hsff-preview-details__preview"></button>`}
                            </div>
                        </div>
                    `;

                    const detailsDiv = document.createElement('div');
                    detailsDiv.innerHTML = detailsCode;


                    // generate iframe embed preview
                    const embedCode = `
                        <body>
                            <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
                            <script>
                            hbspt.forms.create({
                                region: "na1",
                                portalId: "${form.portalId}",
                                formId: "${form.guid}"
                            });
                            </script>
                        </body>
                    `;

                    _this.element.querySelector(".hsff-preview").appendChild(detailsDiv);

                    _this.element.querySelector(`#fields-${_this.options.name}`).onchange = () => _this.updatePreview(_this.element.querySelector(`#fields-${_this.options.name}`).selectize.items[0]);



                    if (!_this.options.disablePreview) {
                        const embedDiv = document.createElement('div');
                        embedDiv.className = "hsff-preview__iframe"                   
                        var iframe = document.createElement('iframe');
                        embedDiv.appendChild(iframe);

                    _this.element.querySelector('.hsff-preview').appendChild(embedDiv);

                    iframe.contentWindow.document.open();
                    iframe.contentWindow.document.write(embedCode);
                    iframe.contentWindow.document.close();

                    _this.element.querySelector(`#${_this.options.name}-preview`).onclick = () => _this.element.querySelector('.hsff-preview').classList.toggle("hsff-preview--open")


                    }





                }
        }
    };

    // A really lightweight plugin wrapper around the constructor,
    // preventing against multiple instantiations
    $.fn[pluginName] = function ( options ) {
        return this.each(function () {
            if (!$.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName,
                new Plugin( this, options ));
            }
        });
    };

})( jQuery, window, document );
