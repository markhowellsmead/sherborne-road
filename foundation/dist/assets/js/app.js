"use strict";function _classCallCheck(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}function _classCallCheck(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}var _typeof="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t};!function(t){function e(t){if(void 0===Function.prototype.name){var e=/function\s([^(]{1,})\(/,n=e.exec(t.toString());return n&&n.length>1?n[1].trim():""}return void 0===t.prototype?t.constructor.name:t.prototype.constructor.name}function n(t){return"true"===t||"false"!==t&&(isNaN(1*t)?t:parseFloat(t))}function i(t){return t.replace(/([a-z])([A-Z])/g,"$1-$2").toLowerCase()}var o="6.3.1",s={version:o,_plugins:{},_uuids:[],rtl:function(){return"rtl"===t("html").attr("dir")},plugin:function(t,n){var o=n||e(t),s=i(o);this._plugins[s]=this[o]=t},registerPlugin:function(t,n){var o=n?i(n):e(t.constructor).toLowerCase();t.uuid=this.GetYoDigits(6,o),t.$element.attr("data-"+o)||t.$element.attr("data-"+o,t.uuid),t.$element.data("zfPlugin")||t.$element.data("zfPlugin",t),t.$element.trigger("init.zf."+o),this._uuids.push(t.uuid)},unregisterPlugin:function(t){var n=i(e(t.$element.data("zfPlugin").constructor));this._uuids.splice(this._uuids.indexOf(t.uuid),1),t.$element.removeAttr("data-"+n).removeData("zfPlugin").trigger("destroyed.zf."+n);for(var o in t)t[o]=null},reInit:function(e){var n=e instanceof t;try{if(n)e.each(function(){t(this).data("zfPlugin")._init()});else{var o="undefined"==typeof e?"undefined":_typeof(e),s=this,a={object:function(e){e.forEach(function(e){e=i(e),t("[data-"+e+"]").foundation("_init")})},string:function(){e=i(e),t("[data-"+e+"]").foundation("_init")},undefined:function(){this.object(Object.keys(s._plugins))}};a[o](e)}}catch(r){console.error(r)}finally{return e}},GetYoDigits:function(t,e){return t=t||6,Math.round(Math.pow(36,t+1)-Math.random()*Math.pow(36,t)).toString(36).slice(1)+(e?"-"+e:"")},reflow:function(e,i){"undefined"==typeof i?i=Object.keys(this._plugins):"string"==typeof i&&(i=[i]);var o=this;t.each(i,function(i,s){var a=o._plugins[s],r=t(e).find("[data-"+s+"]").addBack("[data-"+s+"]");r.each(function(){var e=t(this),i={};if(e.data("zfPlugin"))return void console.warn("Tried to initialize "+s+" on an element that already has a Foundation plugin.");if(e.attr("data-options")){e.attr("data-options").split(";").forEach(function(t,e){var o=t.split(":").map(function(t){return t.trim()});o[0]&&(i[o[0]]=n(o[1]))})}try{e.data("zfPlugin",new a(t(this),i))}catch(o){console.error(o)}finally{return}})})},getFnName:e,transitionend:function(t){var e,n={transition:"transitionend",WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"otransitionend"},i=document.createElement("div");for(var o in n)"undefined"!=typeof i.style[o]&&(e=n[o]);return e?e:(e=setTimeout(function(){t.triggerHandler("transitionend",[t])},1),"transitionend")}};s.util={throttle:function(t,e){var n=null;return function(){var i=this,o=arguments;null===n&&(n=setTimeout(function(){t.apply(i,o),n=null},e))}}};var a=function(n){var i="undefined"==typeof n?"undefined":_typeof(n),o=t("meta.foundation-mq"),a=t(".no-js");if(o.length||t('<meta class="foundation-mq">').appendTo(document.head),a.length&&a.removeClass("no-js"),"undefined"===i)s.MediaQuery._init(),s.reflow(this);else{if("string"!==i)throw new TypeError("We're sorry, "+i+" is not a valid parameter. You must use a string representing the method you wish to invoke.");var r=Array.prototype.slice.call(arguments,1),l=this.data("zfPlugin");if(void 0===l||void 0===l[n])throw new ReferenceError("We're sorry, '"+n+"' is not an available method for "+(l?e(l):"this element")+".");1===this.length?l[n].apply(l,r):this.each(function(e,i){l[n].apply(t(i).data("zfPlugin"),r)})}return this};window.Foundation=s,t.fn.foundation=a,function(){Date.now&&window.Date.now||(window.Date.now=Date.now=function(){return(new Date).getTime()});for(var t=["webkit","moz"],e=0;e<t.length&&!window.requestAnimationFrame;++e){var n=t[e];window.requestAnimationFrame=window[n+"RequestAnimationFrame"],window.cancelAnimationFrame=window[n+"CancelAnimationFrame"]||window[n+"CancelRequestAnimationFrame"]}if(/iP(ad|hone|od).*OS 6/.test(window.navigator.userAgent)||!window.requestAnimationFrame||!window.cancelAnimationFrame){var i=0;window.requestAnimationFrame=function(t){var e=Date.now(),n=Math.max(i+16,e);return setTimeout(function(){t(i=n)},n-e)},window.cancelAnimationFrame=clearTimeout}window.performance&&window.performance.now||(window.performance={start:Date.now(),now:function(){return Date.now()-this.start}})}(),Function.prototype.bind||(Function.prototype.bind=function(t){if("function"!=typeof this)throw new TypeError("Function.prototype.bind - what is trying to be bound is not callable");var e=Array.prototype.slice.call(arguments,1),n=this,i=function(){},o=function(){return n.apply(this instanceof i?this:t,e.concat(Array.prototype.slice.call(arguments)))};return this.prototype&&(i.prototype=this.prototype),o.prototype=new i,o})}(jQuery),!function(t){function e(t,e,i,o){var s,a,r,l,c=n(t);if(e){var u=n(e);a=c.offset.top+c.height<=u.height+u.offset.top,s=c.offset.top>=u.offset.top,r=c.offset.left>=u.offset.left,l=c.offset.left+c.width<=u.width+u.offset.left}else a=c.offset.top+c.height<=c.windowDims.height+c.windowDims.offset.top,s=c.offset.top>=c.windowDims.offset.top,r=c.offset.left>=c.windowDims.offset.left,l=c.offset.left+c.width<=c.windowDims.width;var f=[a,s,r,l];return i?r===l==!0:o?s===a==!0:f.indexOf(!1)===-1}function n(t,e){if(t=t.length?t[0]:t,t===window||t===document)throw new Error("I'm sorry, Dave. I'm afraid I can't do that.");var n=t.getBoundingClientRect(),i=t.parentNode.getBoundingClientRect(),o=document.body.getBoundingClientRect(),s=window.pageYOffset,a=window.pageXOffset;return{width:n.width,height:n.height,offset:{top:n.top+s,left:n.left+a},parentDims:{width:i.width,height:i.height,offset:{top:i.top+s,left:i.left+a}},windowDims:{width:o.width,height:o.height,offset:{top:s,left:a}}}}function i(t,e,i,o,s,a){var r=n(t),l=e?n(e):null;switch(i){case"top":return{left:Foundation.rtl()?l.offset.left-r.width+l.width:l.offset.left,top:l.offset.top-(r.height+o)};case"left":return{left:l.offset.left-(r.width+s),top:l.offset.top};case"right":return{left:l.offset.left+l.width+s,top:l.offset.top};case"center top":return{left:l.offset.left+l.width/2-r.width/2,top:l.offset.top-(r.height+o)};case"center bottom":return{left:a?s:l.offset.left+l.width/2-r.width/2,top:l.offset.top+l.height+o};case"center left":return{left:l.offset.left-(r.width+s),top:l.offset.top+l.height/2-r.height/2};case"center right":return{left:l.offset.left+l.width+s+1,top:l.offset.top+l.height/2-r.height/2};case"center":return{left:r.windowDims.offset.left+r.windowDims.width/2-r.width/2,top:r.windowDims.offset.top+r.windowDims.height/2-r.height/2};case"reveal":return{left:(r.windowDims.width-r.width)/2,top:r.windowDims.offset.top+o};case"reveal full":return{left:r.windowDims.offset.left,top:r.windowDims.offset.top};case"left bottom":return{left:l.offset.left,top:l.offset.top+l.height+o};case"right bottom":return{left:l.offset.left+l.width+s-r.width,top:l.offset.top+l.height+o};default:return{left:Foundation.rtl()?l.offset.left-r.width+l.width:l.offset.left+s,top:l.offset.top+l.height+o}}}Foundation.Box={ImNotTouchingYou:e,GetDimensions:n,GetOffsets:i}}(jQuery),!function(t){function e(t){var e={};for(var n in t)e[t[n]]=t[n];return e}var n={9:"TAB",13:"ENTER",27:"ESCAPE",32:"SPACE",37:"ARROW_LEFT",38:"ARROW_UP",39:"ARROW_RIGHT",40:"ARROW_DOWN"},i={},o={keys:e(n),parseKey:function(t){var e=n[t.which||t.keyCode]||String.fromCharCode(t.which).toUpperCase();return e=e.replace(/\W+/,""),t.shiftKey&&(e="SHIFT_"+e),t.ctrlKey&&(e="CTRL_"+e),t.altKey&&(e="ALT_"+e),e=e.replace(/_$/,"")},handleKey:function(e,n,o){var s,a,r,l=i[n],c=this.parseKey(e);if(!l)return console.warn("Component not defined!");if(s="undefined"==typeof l.ltr?l:Foundation.rtl()?t.extend({},l.ltr,l.rtl):t.extend({},l.rtl,l.ltr),a=s[c],r=o[a],r&&"function"==typeof r){var u=r.apply();(o.handled||"function"==typeof o.handled)&&o.handled(u)}else(o.unhandled||"function"==typeof o.unhandled)&&o.unhandled()},findFocusable:function(e){return!!e&&e.find("a[href], area[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), iframe, object, embed, *[tabindex], *[contenteditable]").filter(function(){return!(!t(this).is(":visible")||t(this).attr("tabindex")<0)})},register:function(t,e){i[t]=e},trapFocus:function(t){var e=Foundation.Keyboard.findFocusable(t),n=e.eq(0),i=e.eq(-1);t.on("keydown.zf.trapfocus",function(t){t.target===i[0]&&"TAB"===Foundation.Keyboard.parseKey(t)?(t.preventDefault(),n.focus()):t.target===n[0]&&"SHIFT_TAB"===Foundation.Keyboard.parseKey(t)&&(t.preventDefault(),i.focus())})},releaseFocus:function(t){t.off("keydown.zf.trapfocus")}};Foundation.Keyboard=o}(jQuery);var _typeof="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t};!function(t){function e(t){var e={};return"string"!=typeof t?e:(t=t.trim().slice(1,-1))?e=t.split("&").reduce(function(t,e){var n=e.replace(/\+/g," ").split("="),i=n[0],o=n[1];return i=decodeURIComponent(i),o=void 0===o?null:decodeURIComponent(o),t.hasOwnProperty(i)?Array.isArray(t[i])?t[i].push(o):t[i]=[t[i],o]:t[i]=o,t},{}):e}var n={queries:[],current:"",_init:function(){var n,i=this,o=t(".foundation-mq").css("font-family");n=e(o);for(var s in n)n.hasOwnProperty(s)&&i.queries.push({name:s,value:"only screen and (min-width: "+n[s]+")"});this.current=this._getCurrentSize(),this._watcher()},atLeast:function(t){var e=this.get(t);return!!e&&window.matchMedia(e).matches},is:function(t){return t=t.trim().split(" "),t.length>1&&"only"===t[1]?t[0]===this._getCurrentSize():this.atLeast(t[0])},get:function(t){for(var e in this.queries)if(this.queries.hasOwnProperty(e)){var n=this.queries[e];if(t===n.name)return n.value}return null},_getCurrentSize:function(){for(var t,e=0;e<this.queries.length;e++){var n=this.queries[e];window.matchMedia(n.value).matches&&(t=n)}return"object"===("undefined"==typeof t?"undefined":_typeof(t))?t.name:t},_watcher:function(){var e=this;t(window).on("resize.zf.mediaquery",function(){var n=e._getCurrentSize(),i=e.current;n!==i&&(e.current=n,t(window).trigger("changed.zf.mediaquery",[n,i]))})}};Foundation.MediaQuery=n,window.matchMedia||(window.matchMedia=function(){var t=window.styleMedia||window.media;if(!t){var e=document.createElement("style"),n=document.getElementsByTagName("script")[0],i=null;e.type="text/css",e.id="matchmediajs-test",n&&n.parentNode&&n.parentNode.insertBefore(e,n),i="getComputedStyle"in window&&window.getComputedStyle(e,null)||e.currentStyle,t={matchMedium:function(t){var n="@media "+t+"{ #matchmediajs-test { width: 1px; } }";return e.styleSheet?e.styleSheet.cssText=n:e.textContent=n,"1px"===i.width}}}return function(e){return{matches:t.matchMedium(e||"all"),media:e||"all"}}}()),Foundation.MediaQuery=n}(jQuery),!function(t){function e(t,e,n){function i(r){a||(a=r),s=r-a,n.apply(e),s<t?o=window.requestAnimationFrame(i,e):(window.cancelAnimationFrame(o),e.trigger("finished.zf.animate",[e]).triggerHandler("finished.zf.animate",[e]))}var o,s,a=null;return 0===t?(n.apply(e),void e.trigger("finished.zf.animate",[e]).triggerHandler("finished.zf.animate",[e])):void(o=window.requestAnimationFrame(i))}function n(e,n,s,a){function r(){e||n.hide(),l(),a&&a.apply(n)}function l(){n[0].style.transitionDuration=0,n.removeClass(c+" "+u+" "+s)}if(n=t(n).eq(0),n.length){var c=e?i[0]:i[1],u=e?o[0]:o[1];l(),n.addClass(s).css("transition","none"),requestAnimationFrame(function(){n.addClass(c),e&&n.show()}),requestAnimationFrame(function(){n[0].offsetWidth,n.css("transition","").addClass(u)}),n.one(Foundation.transitionend(n),r)}}var i=["mui-enter","mui-leave"],o=["mui-enter-active","mui-leave-active"],s={animateIn:function(t,e,i){n(!0,t,e,i)},animateOut:function(t,e,i){n(!1,t,e,i)}};Foundation.Move=e,Foundation.Motion=s}(jQuery),!function(t){var e={Feather:function(e){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"zf";e.attr("role","menubar");var i=e.find("li").attr({role:"menuitem"}),o="is-"+n+"-submenu",s=o+"-item",a="is-"+n+"-submenu-parent";i.each(function(){var e=t(this),i=e.children("ul");i.length&&(e.addClass(a).attr({"aria-haspopup":!0,"aria-label":e.children("a:first").text()}),"drilldown"===n&&e.attr({"aria-expanded":!1}),i.addClass("submenu "+o).attr({"data-submenu":"",role:"menu"}),"drilldown"===n&&i.attr({"aria-hidden":!0})),e.parent("[data-submenu]").length&&e.addClass("is-submenu-item "+s)})},Burn:function(t,e){var n="is-"+e+"-submenu",i=n+"-item",o="is-"+e+"-submenu-parent";t.find(">li, .menu, .menu > li").removeClass(n+" "+i+" "+o+" is-submenu-item submenu is-active").removeAttr("data-submenu").css("display","")}};Foundation.Nest=e}(jQuery),!function(t){function e(t,e,n){var i,o,s=this,a=e.duration,r=Object.keys(t.data())[0]||"timer",l=-1;this.isPaused=!1,this.restart=function(){l=-1,clearTimeout(o),this.start()},this.start=function(){this.isPaused=!1,clearTimeout(o),l=l<=0?a:l,t.data("paused",!1),i=Date.now(),o=setTimeout(function(){e.infinite&&s.restart(),n&&"function"==typeof n&&n()},l),t.trigger("timerstart.zf."+r)},this.pause=function(){this.isPaused=!0,clearTimeout(o),t.data("paused",!0);var e=Date.now();l-=e-i,t.trigger("timerpaused.zf."+r)}}function n(e,n){function i(){o--,0===o&&n()}var o=e.length;0===o&&n(),e.each(function(){if(this.complete||4===this.readyState||"complete"===this.readyState)i();else{var e=t(this).attr("src");t(this).attr("src",e+(e.indexOf("?")>=0?"&":"?")+(new Date).getTime()),t(this).one("load",function(){i()})}})}Foundation.Timer=e,Foundation.onImagesLoaded=n}(jQuery),function(t){function e(){this.removeEventListener("touchmove",n),this.removeEventListener("touchend",e),c=!1}function n(n){if(t.spotSwipe.preventDefault&&n.preventDefault(),c){var i,o=n.touches[0].pageX,a=(n.touches[0].pageY,s-o);l=(new Date).getTime()-r,Math.abs(a)>=t.spotSwipe.moveThreshold&&l<=t.spotSwipe.timeThreshold&&(i=a>0?"left":"right"),i&&(n.preventDefault(),e.call(this),t(this).trigger("swipe",i).trigger("swipe"+i))}}function i(t){1==t.touches.length&&(s=t.touches[0].pageX,a=t.touches[0].pageY,c=!0,r=(new Date).getTime(),this.addEventListener("touchmove",n,!1),this.addEventListener("touchend",e,!1))}function o(){this.addEventListener&&this.addEventListener("touchstart",i,!1)}t.spotSwipe={version:"1.0.0",enabled:"ontouchstart"in document.documentElement,preventDefault:!1,moveThreshold:75,timeThreshold:200};var s,a,r,l,c=!1;t.event.special.swipe={setup:o},t.each(["left","up","down","right"],function(){t.event.special["swipe"+this]={setup:function(){t(this).on("swipe",t.noop)}}})}(jQuery),!function(t){t.fn.addTouch=function(){this.each(function(n,i){t(i).bind("touchstart touchmove touchend touchcancel",function(){e(event)})});var e=function(t){var e,n=t.changedTouches,i=n[0],o={touchstart:"mousedown",touchmove:"mousemove",touchend:"mouseup"},s=o[t.type];"MouseEvent"in window&&"function"==typeof window.MouseEvent?e=new window.MouseEvent(s,{bubbles:!0,cancelable:!0,screenX:i.screenX,screenY:i.screenY,clientX:i.clientX,clientY:i.clientY}):(e=document.createEvent("MouseEvent"),e.initMouseEvent(s,!0,!0,window,1,i.screenX,i.screenY,i.clientX,i.clientY,!1,!1,!1,!1,0,null)),i.target.dispatchEvent(e)}}}(jQuery);var _typeof="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t};!function(t){function e(){a(),i(),o(),s(),n()}function n(e){var n=t("[data-yeti-box]"),i=["dropdown","tooltip","reveal"];if(e&&("string"==typeof e?i.push(e):"object"===("undefined"==typeof e?"undefined":_typeof(e))&&"string"==typeof e[0]?i.concat(e):console.error("Plugin names must be strings")),n.length){var o=i.map(function(t){return"closeme.zf."+t}).join(" ");t(window).off(o).on(o,function(e,n){var i=e.namespace.split(".")[0],o=t("[data-"+i+"]").not('[data-yeti-box="'+n+'"]');o.each(function(){var e=t(this);e.triggerHandler("close.zf.trigger",[e])})})}}function i(e){var n=void 0,i=t("[data-resize]");i.length&&t(window).off("resize.zf.trigger").on("resize.zf.trigger",function(o){n&&clearTimeout(n),n=setTimeout(function(){r||i.each(function(){t(this).triggerHandler("resizeme.zf.trigger")}),i.attr("data-events","resize")},e||10)})}function o(e){var n=void 0,i=t("[data-scroll]");i.length&&t(window).off("scroll.zf.trigger").on("scroll.zf.trigger",function(o){n&&clearTimeout(n),n=setTimeout(function(){r||i.each(function(){t(this).triggerHandler("scrollme.zf.trigger")}),i.attr("data-events","scroll")},e||10)})}function s(e){var n=t("[data-mutate]");n.length&&r&&n.each(function(){t(this).triggerHandler("mutateme.zf.trigger")})}function a(){if(!r)return!1;var e=document.querySelectorAll("[data-resize], [data-scroll], [data-mutate]"),n=function(e){var n=t(e[0].target);switch(e[0].type){case"attributes":"scroll"===n.attr("data-events")&&"data-events"===e[0].attributeName&&n.triggerHandler("scrollme.zf.trigger",[n,window.pageYOffset]),"resize"===n.attr("data-events")&&"data-events"===e[0].attributeName&&n.triggerHandler("resizeme.zf.trigger",[n]),"style"===e[0].attributeName&&(n.closest("[data-mutate]").attr("data-events","mutate"),n.closest("[data-mutate]").triggerHandler("mutateme.zf.trigger",[n.closest("[data-mutate]")]));break;case"childList":n.closest("[data-mutate]").attr("data-events","mutate"),n.closest("[data-mutate]").triggerHandler("mutateme.zf.trigger",[n.closest("[data-mutate]")]);break;default:return!1}};if(e.length)for(var i=0;i<=e.length-1;i++){var o=new r(n);o.observe(e[i],{attributes:!0,childList:!0,characterData:!1,subtree:!0,attributeFilter:["data-events","style"]})}}var r=function(){for(var t=["WebKit","Moz","O","Ms",""],e=0;e<t.length;e++)if(t[e]+"MutationObserver"in window)return window[t[e]+"MutationObserver"];return!1}(),l=function(e,n){e.data(n).split(" ").forEach(function(i){t("#"+i)["close"===n?"trigger":"triggerHandler"](n+".zf.trigger",[e])})};t(document).on("click.zf.trigger","[data-open]",function(){l(t(this),"open")}),t(document).on("click.zf.trigger","[data-close]",function(){var e=t(this).data("close");e?l(t(this),"close"):t(this).trigger("close.zf.trigger")}),t(document).on("click.zf.trigger","[data-toggle]",function(){var e=t(this).data("toggle");e?l(t(this),"toggle"):t(this).trigger("toggle.zf.trigger")}),t(document).on("close.zf.trigger","[data-closable]",function(e){e.stopPropagation();var n=t(this).data("closable");""!==n?Foundation.Motion.animateOut(t(this),n,function(){t(this).trigger("closed.zf")}):t(this).fadeOut().trigger("closed.zf")}),t(document).on("focus.zf.trigger blur.zf.trigger","[data-toggle-focus]",function(){var e=t(this).data("toggle-focus");t("#"+e).triggerHandler("toggle.zf.trigger",[t(this)])}),t(window).on("load",function(){e()}),Foundation.IHearYou=e}(jQuery);var _createClass=function(){function t(t,e){for(var n=0;n<e.length;n++){var i=e[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}return function(e,n,i){return n&&t(e.prototype,n),i&&t(e,i),e}}();!function(t){var e=function(){function e(n,i){_classCallCheck(this,e),this.$element=n,this.options=t.extend({},e.defaults,this.$element.data(),i),this.$lastTrigger=t(),this.$triggers=t(),this._init(),this._events(),Foundation.registerPlugin(this,"OffCanvas"),Foundation.Keyboard.register("OffCanvas",{ESCAPE:"close"})}return _createClass(e,[{key:"_init",value:function(){var e=this.$element.attr("id");if(this.$element.attr("aria-hidden","true"),this.$element.addClass("is-transition-"+this.options.transition),this.$triggers=t(document).find('[data-open="'+e+'"], [data-close="'+e+'"], [data-toggle="'+e+'"]').attr("aria-expanded","false").attr("aria-controls",e),this.options.contentOverlay===!0){var n=document.createElement("div"),i="fixed"===t(this.$element).css("position")?"is-overlay-fixed":"is-overlay-absolute";n.setAttribute("class","js-off-canvas-overlay "+i),this.$overlay=t(n),"is-overlay-fixed"===i?t("body").append(this.$overlay):this.$element.siblings("[data-off-canvas-content]").append(this.$overlay)}this.options.isRevealed=this.options.isRevealed||new RegExp(this.options.revealClass,"g").test(this.$element[0].className),this.options.isRevealed===!0&&(this.options.revealOn=this.options.revealOn||this.$element[0].className.match(/(reveal-for-medium|reveal-for-large)/g)[0].split("-")[2],this._setMQChecker()),!this.options.transitionTime==!0&&(this.options.transitionTime=1e3*parseFloat(window.getComputedStyle(t("[data-off-canvas]")[0]).transitionDuration))}},{key:"_events",value:function(){if(this.$element.off(".zf.trigger .zf.offcanvas").on({"open.zf.trigger":this.open.bind(this),"close.zf.trigger":this.close.bind(this),"toggle.zf.trigger":this.toggle.bind(this),"keydown.zf.offcanvas":this._handleKeyboard.bind(this)}),this.options.closeOnClick===!0){var e=this.options.contentOverlay?this.$overlay:t("[data-off-canvas-content]");e.on({"click.zf.offcanvas":this.close.bind(this)})}}},{key:"_setMQChecker",value:function(){var e=this;t(window).on("changed.zf.mediaquery",function(){Foundation.MediaQuery.atLeast(e.options.revealOn)?e.reveal(!0):e.reveal(!1)}).one("load.zf.offcanvas",function(){Foundation.MediaQuery.atLeast(e.options.revealOn)&&e.reveal(!0)})}},{key:"reveal",value:function(t){var e=this.$element.find("[data-close]");t?(this.close(),this.isRevealed=!0,this.$element.attr("aria-hidden","false"),this.$element.off("open.zf.trigger toggle.zf.trigger"),e.length&&e.hide()):(this.isRevealed=!1,this.$element.attr("aria-hidden","true"),this.$element.on({"open.zf.trigger":this.open.bind(this),"toggle.zf.trigger":this.toggle.bind(this)}),e.length&&e.show())}},{key:"_stopScrolling",value:function(t){return!1}},{key:"_recordScrollable",value:function(t){var e=this;e.scrollHeight!==e.clientHeight&&(0===e.scrollTop&&(e.scrollTop=1),e.scrollTop===e.scrollHeight-e.clientHeight&&(e.scrollTop=e.scrollHeight-e.clientHeight-1)),e.allowUp=e.scrollTop>0,e.allowDown=e.scrollTop<e.scrollHeight-e.clientHeight,e.lastY=t.originalEvent.pageY}},{key:"_stopScrollPropagation",value:function(t){var e=this,n=t.pageY<e.lastY,i=!n;e.lastY=t.pageY,n&&e.allowUp||i&&e.allowDown?t.stopPropagation():t.preventDefault()}},{key:"open",value:function(e,n){if(!this.$element.hasClass("is-open")&&!this.isRevealed){var i=this;n&&(this.$lastTrigger=n),"top"===this.options.forceTo?window.scrollTo(0,0):"bottom"===this.options.forceTo&&window.scrollTo(0,document.body.scrollHeight),i.$element.addClass("is-open"),this.$triggers.attr("aria-expanded","true"),this.$element.attr("aria-hidden","false").trigger("opened.zf.offcanvas"),this.options.contentScroll===!1&&(t("body").addClass("is-off-canvas-open").on("touchmove",this._stopScrolling),this.$element.on("touchstart",this._recordScrollable),this.$element.on("touchmove",this._stopScrollPropagation)),this.options.contentOverlay===!0&&this.$overlay.addClass("is-visible"),this.options.closeOnClick===!0&&this.options.contentOverlay===!0&&this.$overlay.addClass("is-closable"),this.options.autoFocus===!0&&this.$element.one(Foundation.transitionend(this.$element),function(){i.$element.find("a, button").eq(0).focus()}),this.options.trapFocus===!0&&(this.$element.siblings("[data-off-canvas-content]").attr("tabindex","-1"),Foundation.Keyboard.trapFocus(this.$element))}}},{key:"close",value:function(e){if(this.$element.hasClass("is-open")&&!this.isRevealed){var n=this;n.$element.removeClass("is-open"),this.$element.attr("aria-hidden","true").trigger("closed.zf.offcanvas"),this.options.contentScroll===!1&&(t("body").removeClass("is-off-canvas-open").off("touchmove",this._stopScrolling),this.$element.off("touchstart",this._recordScrollable),this.$element.off("touchmove",this._stopScrollPropagation)),this.options.contentOverlay===!0&&this.$overlay.removeClass("is-visible"),this.options.closeOnClick===!0&&this.options.contentOverlay===!0&&this.$overlay.removeClass("is-closable"),this.$triggers.attr("aria-expanded","false"),this.options.trapFocus===!0&&(this.$element.siblings("[data-off-canvas-content]").removeAttr("tabindex"),Foundation.Keyboard.releaseFocus(this.$element))}}},{key:"toggle",value:function(t,e){this.$element.hasClass("is-open")?this.close(t,e):this.open(t,e)}},{key:"_handleKeyboard",value:function(t){var e=this;Foundation.Keyboard.handleKey(t,"OffCanvas",{close:function(){return e.close(),e.$lastTrigger.focus(),!0},handled:function(){t.stopPropagation(),t.preventDefault()}})}},{key:"destroy",value:function(){this.close(),this.$element.off(".zf.trigger .zf.offcanvas"),this.$overlay.off(".zf.offcanvas"),Foundation.unregisterPlugin(this)}}]),e}();e.defaults={closeOnClick:!0,contentOverlay:!0,contentScroll:!0,transitionTime:0,transition:"push",forceTo:null,isRevealed:!1,revealOn:null,autoFocus:!0,revealClass:"reveal-for-",trapFocus:!1},Foundation.plugin(e,"OffCanvas")}(jQuery);var _createClass=function(){function t(t,e){for(var n=0;n<e.length;n++){var i=e[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}return function(e,n,i){return n&&t(e.prototype,n),i&&t(e,i),e}}();!function(t){function e(t){return parseInt(window.getComputedStyle(document.body,null).fontSize,10)*t}var n=function(){function n(e,i){_classCallCheck(this,n),this.$element=e,this.options=t.extend({},n.defaults,this.$element.data(),i),this._init(),Foundation.registerPlugin(this,"Sticky")}return _createClass(n,[{key:"_init",value:function(){var e=this.$element.parent("[data-sticky-container]"),n=this.$element[0].id||Foundation.GetYoDigits(6,"sticky"),i=this;e.length||(this.wasWrapped=!0),this.$container=e.length?e:t(this.options.container).wrapInner(this.$element),this.$container.addClass(this.options.containerClass),this.$element.addClass(this.options.stickyClass).attr({"data-resize":n}),this.scrollCount=this.options.checkEvery,this.isStuck=!1,t(window).one("load.zf.sticky",function(){i.containerHeight="none"==i.$element.css("display")?0:i.$element[0].getBoundingClientRect().height,i.$container.css("height",i.containerHeight),i.elemHeight=i.containerHeight,""!==i.options.anchor?i.$anchor=t("#"+i.options.anchor):i._parsePoints(),i._setSizes(function(){var t=window.pageYOffset;i._calc(!1,t),i.isStuck||i._removeSticky(!(t>=i.topPoint))}),i._events(n.split("-").reverse().join("-"))})}},{key:"_parsePoints",value:function(){for(var e=""==this.options.topAnchor?1:this.options.topAnchor,n=""==this.options.btmAnchor?document.documentElement.scrollHeight:this.options.btmAnchor,i=[e,n],o={},s=0,a=i.length;s<a&&i[s];s++){var r;if("number"==typeof i[s])r=i[s];else{var l=i[s].split(":"),c=t("#"+l[0]);r=c.offset().top,l[1]&&"bottom"===l[1].toLowerCase()&&(r+=c[0].getBoundingClientRect().height)}o[s]=r}this.points=o}},{key:"_events",value:function(e){var n=this,i=this.scrollListener="scroll.zf."+e;this.isOn||(this.canStick&&(this.isOn=!0,t(window).off(i).on(i,function(t){0===n.scrollCount?(n.scrollCount=n.options.checkEvery,n._setSizes(function(){n._calc(!1,window.pageYOffset)})):(n.scrollCount--,n._calc(!1,window.pageYOffset))})),this.$element.off("resizeme.zf.trigger").on("resizeme.zf.trigger",function(t,o){n._setSizes(function(){n._calc(!1),n.canStick?n.isOn||n._events(e):n.isOn&&n._pauseListeners(i)})}))}},{key:"_pauseListeners",value:function(e){this.isOn=!1,t(window).off(e),this.$element.trigger("pause.zf.sticky")}},{key:"_calc",value:function(t,e){return t&&this._setSizes(),this.canStick?(e||(e=window.pageYOffset),void(e>=this.topPoint?e<=this.bottomPoint?this.isStuck||this._setSticky():this.isStuck&&this._removeSticky(!1):this.isStuck&&this._removeSticky(!0))):(this.isStuck&&this._removeSticky(!0),!1)}},{key:"_setSticky",value:function(){var t=this,e=this.options.stickTo,n="top"===e?"marginTop":"marginBottom",i="top"===e?"bottom":"top",o={};o[n]=this.options[n]+"em",o[e]=0,o[i]="auto",this.isStuck=!0,this.$element.removeClass("is-anchored is-at-"+i).addClass("is-stuck is-at-"+e).css(o).trigger("sticky.zf.stuckto:"+e),this.$element.on("transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd",function(){t._setSizes()})}},{key:"_removeSticky",value:function(t){var e=this.options.stickTo,n="top"===e,i={},o=(this.points?this.points[1]-this.points[0]:this.anchorHeight)-this.elemHeight,s=n?"marginTop":"marginBottom",a=t?"top":"bottom";i[s]=0,i.bottom="auto",t?i.top=0:i.top=o,this.isStuck=!1,this.$element.removeClass("is-stuck is-at-"+e).addClass("is-anchored is-at-"+a).css(i).trigger("sticky.zf.unstuckfrom:"+a)}},{key:"_setSizes",value:function(t){this.canStick=Foundation.MediaQuery.is(this.options.stickyOn),this.canStick||t&&"function"==typeof t&&t();var e=this.$container[0].getBoundingClientRect().width,n=window.getComputedStyle(this.$container[0]),i=parseInt(n["padding-left"],10),o=parseInt(n["padding-right"],10);this.$anchor&&this.$anchor.length?this.anchorHeight=this.$anchor[0].getBoundingClientRect().height:this._parsePoints(),this.$element.css({"max-width":e-i-o+"px"});var s=this.$element[0].getBoundingClientRect().height||this.containerHeight;if("none"==this.$element.css("display")&&(s=0),this.containerHeight=s,this.$container.css({height:s}),this.elemHeight=s,!this.isStuck&&this.$element.hasClass("is-at-bottom")){var a=(this.points?this.points[1]-this.$container.offset().top:this.anchorHeight)-this.elemHeight;this.$element.css("top",a)}this._setBreakPoints(s,function(){t&&"function"==typeof t&&t()})}},{key:"_setBreakPoints",value:function(t,n){if(!this.canStick){if(!n||"function"!=typeof n)return!1;n()}var i=e(this.options.marginTop),o=e(this.options.marginBottom),s=this.points?this.points[0]:this.$anchor.offset().top,a=this.points?this.points[1]:s+this.anchorHeight,r=window.innerHeight;"top"===this.options.stickTo?(s-=i,a-=t+i):"bottom"===this.options.stickTo&&(s-=r-(t+o),a-=r-o),this.topPoint=s,this.bottomPoint=a,n&&"function"==typeof n&&n()}},{key:"destroy",value:function(){this._removeSticky(!0),this.$element.removeClass(this.options.stickyClass+" is-anchored is-at-top").css({height:"",top:"",bottom:"","max-width":""}).off("resizeme.zf.trigger"),this.$anchor&&this.$anchor.length&&this.$anchor.off("change.zf.sticky"),t(window).off(this.scrollListener),this.wasWrapped?this.$element.unwrap():this.$container.removeClass(this.options.containerClass).css({height:""}),Foundation.unregisterPlugin(this)}}]),n}();n.defaults={container:"<div data-sticky-container></div>",stickTo:"top",anchor:"",topAnchor:"",btmAnchor:"",marginTop:1,marginBottom:1,stickyOn:"medium",stickyClass:"sticky",containerClass:"sticky-container",checkEvery:-1},Foundation.plugin(n,"Sticky")}(jQuery),function(t,e){t(document).foundation(),window.console.log(Foundation.OffCanvas)}(jQuery);