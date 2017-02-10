////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/// JQUERY WRAPPER FUNCTION
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * JQuery plugin Wrapper function
 * @param {type} $
 * @returns {undefined}
 */
$(function ($)
{
    jQuery.fn.extend({
        glassPane: function () {
            return $.data(this[0], "glassPane", new GlassPane(this, options));
        },
        showDialog: function () {
            $.data(this[0], "glassPane").showDialog();
        },
        hideDialog: function ()
        {
            $.data(this[0], "glassPane").hideDialog();
        },
        onHide: function (onHideFunction)
        {
            $.data(this[0], "glassPane").options.onHide = onHideFunction;
        },
        centerDialog: function ()
        {
            $.data(this[0], "glassPane").centerDialog();
        }

    });

});


/**
 * Constructor of the GlassPane class.
 * @param {type} Container The container that the dialog must contain.
 * @param {type} Options of the plugin.
 * @returns {TIDialog}
 */
function GlassPane(container, options) //Constructor
{
    var thisDialog = this;

    this.placeholder = container;

    if (typeof options !== "undefined")
        this.options = options;
    else
        this.options = {};

    this.dialog = $("<div class='dialogBox' id='dialog'></div>");
    this.dialog.append(this.placeholder);
    this.dialog.hide();
    $(document.body).append(this.dialog);

    if (typeof this.options.glass === 'undefined' || this.options.glass === true)
    {
        this.glass = $("<div id='glassPane' class='glassPane'></div>");
        this.glass.hide();
        $(document.body).append(this.glass);

        if (typeof this.options.autohide === 'undefined' || this.options.autohide === true)
        {
            this.glass.click(function ()
            {
                thisDialog.hideDialog();
            });
        } else
        {
            this.glass.click(function ()
            {
                //Function when clicking on the glassPane
                if (typeof (thisDialog.options.hidefunction) === "function") {
                    hidefunction();
                }
            });
        }

    }

    //Escape key to close dialog
    jQuery(document).keydown(function (e) {

        if (e.keyCode === 27) {
            thisDialog.hideDialog();
        }   // esc

    });

    $(window).resize(function () {
        thisDialog.centerDialog();
    });

    return this; //Return object, for jQuery coherence
}

/**
 * Show the dialog
 */
GlassPane.prototype.showDialog = function ()
{
    this.placeholder.show();

    if (typeof this.options.glass === 'undefined' || this.options.glass === true)
        this.glass.fadeIn(300);

    this.dialog.show();
    this.centerDialog();

};

GlassPane.prototype.centerDialog = function ()
{
    this.dialog.css("top", ($(window).height() / 2 - this.dialog.height() / 2) + "px");
    this.dialog.css("left", ($(window).width() / 2 - this.dialog.width() / 2) + "px");

    this.dialog.css("top", Math.max(0, (($(window).height() - $(this.dialog).outerHeight()) / 2) +
            $(window).scrollTop()) + "px");
    this.dialog.css("left", Math.max(0, (($(window).width() - $(this.dialog).outerWidth()) / 2) +
            $(window).scrollLeft()) + "px");
};

/**
 * Hide the dialog
 */
GlassPane.prototype.hideDialog = function ()
{
    if (typeof (this.options.onHide) !== "undefined")
    {
        this.options.onHide();
    }

    this.dialog.hide(300);

    if (typeof this.options.glass === 'undefined' || this.options.glass === true)
        this.glass.fadeOut(300);
};
