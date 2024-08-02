 <?php 

include'inc/des/header.php';

?>
  <div class="under-header">
    <div class="container">
    </div>
  </div>
  <div class="main section" id="main">
    <div class="container">
        <?php
$url = "https://shootz.yalla-shoot-tv.live/privacy-policy/"; // الرابط الذي تريد جلب المحتوى منه
$newDomain = "contact.php"; // النطاق الجديد الذي تريد استبداله

// جلب المحتوى من الموقع
$content = file_get_contents($url);

if ($content === FALSE) {
    echo "Failed to retrieve content.";
    exit;
}

// إنشاء كائن DOMDocument
$dom = new DOMDocument();
// استبدال "Yalla Shoot" بـ "Bashar" في المحتوى




$search = ["ahmed","Yalla Shoot", "yalla shoot", "يلا شوت","https://shootz.yalla-shoot-tv.live/","/cdn-cgi/l/email-protection"]; // الكلمات التي تريد استبدالها
$replace = ["Bashar","Kora Now", "Kora Now", "كورة الان","contact.php","mailto:basharessam4@gmail.com"]; // البدائل

$content = str_replace($search, $replace, $content);
 

// تحميل HTML في كائن DOMDocument
libxml_use_internal_errors(true); // تجاهل الأخطاء الناتجة عن عدم توافق HTML
$dom->loadHTML($content);
libxml_clear_errors();

// تعديل الروابط في المحتوى
$xpath = new DOMXPath($dom);
$tags = ['a', 'img', 'link', 'script']; // يمكنك إضافة أو إزالة العلامات التي تحتاج لتعديل روابطها

foreach ($tags as $tag) {
    foreach ($dom->getElementsByTagName($tag) as $element) {
        if ($element->hasAttribute('href')) {
            $urlAttr = $element->getAttribute('href');
            $element->setAttribute('href', str_replace("https://shootz.yalla-shoot-tv.live/", $newDomain, $urlAttr));
        }

        // $newurl='kora';
        // if ($element->hasAttribute('src')) {
        //     $urlAttr = $element->getAttribute('src');
        //     $element->setAttribute('src', str_replace("https://yallateri.com", $newurl, $urlAttr));
        // }
         
    }
}

// البحث عن العناصر باستخدام اسم الفئة
$className = "blogpost"; // اسم الفئة الذي تريد جلب العناصر بناءً عليه
$elements = $xpath->query("//*[contains(@class, '$className')]");

if ($elements->length > 0) {
    foreach ($elements as $element) {
        // عرض محتوى العنصر بعد تعديل الروابط
        echo $dom->saveHTML($element)  ; // استخدم saveHTML للحصول على HTML كامل للعنصر
    }
} else {
    echo "No elements with class '$className' found.";
}
?>







  
    </div>

  </div>

  <?php 

include'inc/des/footer.php';

?>
  <script>
    //<![CDATA[
    function rdmode() {
      localStorage.setItem("mode", "rdmode" === localStorage.getItem("mode") ? "light" : "rdmode"), "rdmode" === localStorage.getItem("mode") ? document.querySelector("body").classList.add("Night") : document.querySelector("body").classList.remove("Night")
    };
    //]]>
  </script>
  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="spinner" viewBox="0 0 512 512">
      <path fill="currentColor" d="M304 48c0 26.51-21.49 48-48 48s-48-21.49-48-48 21.49-48 48-48 48 21.49 48 48zm-48 368c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zm208-208c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zM96 256c0-26.51-21.49-48-48-48S0 229.49 0 256s21.49 48 48 48 48-21.49 48-48zm12.922 99.078c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.491-48-48-48zm294.156 0c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.49-48-48-48zM108.922 60.922c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.491-48-48-48z"></path>
    </symbol>
  </svg>
  <script>
    ! function() {
      function t(e) {
        var o = n[e];
        return "object" == typeof o ? o : (o.exports || (o.exports = {}, o.exports = o.call(o.exports, t, o.exports, o) || o.exports), o.exports)
      }

      function e(t, e) {
        n[t] = e
      }
      var n = {};
      e("./defaults.js", function(t, e, n) {
        n.exports = {
          root: document,
          container: !1,
          elements: ".hqy-lazy",
          success: !1,
          error: !1,
          offset: 2,
          separator: ",",
          loadingClass: "hqy-loading",
          successClass: "hqy-loaded",
          errorClass: "hqy-error",
          breakpoints: !1,
          loadInvisible: !1,
          validateDelay: 25,
          saveViewportOffsetDelay: 50,
          srcset: "data-srcset",
          src: "data-src"
        }
      }), e("./dom.js", function(t, e, n) {
        var o = t("./utils.js"),
          i = e.setAttr = function(t, e, n) {
            t.setAttribute(e, n)
          },
          s = e.getAttr = function(t, e) {
            return t.getAttribute(e)
          },
          r = (e.removeAttr = function(t, e) {
            t.removeAttribute(e)
          }, {}),
          a = e.hasClass = function(t, e) {
            return r[e] || (r[e] = new RegExp("(\\s|^)" + e + "(\\s|$)")), r[e].test(s(t, "class") || "") && r[e]
          };
        e.addClass = function(t, e) {
          a(t, e) || i(t, "class", o.trim(s(t, "class") || "") + " " + e)
        }, e.removeClass = function(t, e) {
          var n;
          (n = a(t, e)) && i(t, "class", (s(t, "class") || "").replace(n, " "))
        }, e.toElements = function(t) {
          if (o.isString(t)) return e.querySelectorAll(t);
          if (t && t.length) {
            for (var n = [], i = t.length; i--; n.unshift(t[i]));
            return n
          }
          return t ? [t] : []
        }, e.querySelectorAll = function(t, e) {
          if (document.querySelectorAll) e = document.querySelectorAll(t);
          else {
            var n = document,
              o = n.styleSheets[0] || n.createStyleSheet();
            o.addRule(t, "f:b");
            for (var i = n.all, s = 0, r = [], a = i.length; s < a; s++) i[s].currentStyle.f && r.push(i[s]);
            o.removeRule(0), e = r
          }
          return e
        }, e.contains = function(t, e, n) {
          if (t == e) return !0;
          if (!e || !e.nodeType || 1 != e.nodeType) return !1;
          if (t.contains) return t.contains(e);
          if (t.compareDocumentPosition) return !!(16 & t.compareDocumentPosition(e));
          for (var o = e.parentNode; o && o != n;) {
            if (o == t) return !0;
            o = o.parentNode
          }
          return !1
        }, e.equal = function(t, e) {
          return t.nodeName.toLowerCase() === e
        }, e.bindEvent = function(t, e, n) {
          t.attachEvent ? t.attachEvent && t.attachEvent("on" + e, n) : t.addEventListener(e, n, {
            capture: !1,
            passive: !0
          })
        }, e.unbindEvent = function(t, e, n) {
          t.detachEvent ? t.detachEvent && t.detachEvent("on" + e, n) : t.removeEventListener(e, n, {
            capture: !1,
            passive: !0
          })
        }
      }), e("./index.js", function(t, e, n) {
        function o(t) {
          this.init(t)
        }
        var i = t("./utils.js"),
          s = t("./defaults.js"),
          r = t("./dom.js"),
          a = t("./loadElement.js");
        n.exports = o;
        var l = (window.devicePixelRatio || window.screen.deviceXDPI / window.screen.logicalXDPI) > 1,
          c = function(t, e) {
            t.bottom = (window.innerHeight || document.documentElement.clientHeight) + e, t.right = (window.innerWidth || document.documentElement.clientWidth) + e
          };
        i.assign(o.prototype, a, {
          init: function(t) {
            t = t || {}, this.options = {};
            for (var e in s) this.options[e] = t[e] || s[e];
            this.initContext(), this.render()
          },
          initContext: function() {
            var t = this.options,
              e = this.context = {
                attrSrc: "src",
                attrSrcset: "srcset",
                source: t.src,
                elements: [],
                container: r.toElements(t.container)[0] || !1,
                destroyed: !0,
                isRetina: l,
                viewport: {
                  top: 0 - t.offset,
                  left: 0 - t.offset
                },
                validateT: i.throttle(function() {
                  this.validate()
                }, t.validateDelay, this),
                saveViewportOffsetT: i.throttle(function() {
                  c(e.viewport, t.offset)
                }, t.validateDelay, this)
              };
            c(e.viewport, t.offset), i.each(t.breakpoints, function(t) {
              if (t.width >= window.screen.width) return e.source = t.src, !1
            })
          },
          render: function() {
            var t = this.options,
              e = this.context;
            e.elements = r.toElements(t.elements), e.destroyed && (e.destroyed = !1, e.container && r.bindEvent(e.container, "scroll", e.validateT), r.bindEvent(window, "resize", e.saveViewportOffsetT), r.bindEvent(window, "resize", e.validateT), r.bindEvent(window, "scroll", e.validateT)), this.validate()
          },
          destroy: function() {
            this.options;
            var t = this.context;
            t.container && r.unbindEvent(t.container, "scroll", t.validateT), r.unbindEvent(window, "scroll", t.validateT), r.unbindEvent(window, "resize", t.validateT), r.unbindEvent(window, "resize", t.saveViewportOffsetT), t.elements = [], t.destroyed = !0
          },
          validate: function() {
            var t = this.options,
              e = this.context,
              n = e.elements,
              o = n.length;
            i.each(n, function(n) {
              if (!(r.hasClass(n, e.loadingClass) || r.hasClass(n, t.successClass) || r.hasClass(n, t.errorClass))) return this.elementInView(n) ? (this.loadElement(n), void o--) : void 0;
              o--
            }, this), o <= 0 && this.destroy()
          },
          elementInView: function(t) {
            var e = this.options,
              n = this.context,
              o = n.viewport,
              s = n.container,
              a = t.getBoundingClientRect();
            if (r.container && r.contains(s, t)) {
              var l = s.getBoundingClientRect();
              if (inView(l, o)) {
                var c = l.top - e.offset,
                  d = l.right + e.offset,
                  u = l.bottom + e.offset,
                  f = l.left - e.offset,
                  h = {
                    top: c > o.top ? c : o.top,
                    right: d < o.right ? d : o.right,
                    bottom: u < o.bottom ? u : o.bottom,
                    left: f > o.left ? f : o.left
                  };
                return i.inView(a, h)
              }
              return !1
            }
            return i.inView(a, o)
          },
          load: function(t, e) {
            this.context.elements = r.toElements(t), i.each(t, function(t) {
              this.loadElement(element, e)
            }, this)
          }
        })
      }), e("./loadElement.js", function(t, e, n) {
        function o(t, e, n, o) {
          var r = this,
            a = s.equal(t, "img"),
            l = e.split(n.separator),
            c = l[o.isRetina && l.length > 1 ? 1 : 0],
            d = s.getAttr(t, n.srcset),
            u = t.parentNode,
            f = u && s.equal(u, "picture");
          if (!a && !i.isUndefined(t.src)) return t.src = c, void this.loadElementSuccess(t);
          var h = new Image,
            v = function() {
              r.loadElementError(t, "invalid"), s.unbindEvent(h, "error", v), s.unbindEvent(h, "load", m)
            },
            m = function() {
              a ? f || r.handleSrcsetElement(t, c, d) : t.style.backgroundImage = 'url("' + c + '")', r.loadElementSuccess(t), s.unbindEvent(h, "error", v), s.unbindEvent(h, "load", m)
            };
          f && (h = t, i.each(u.getElementsByTagName("source"), function(t) {
            this.handleSourceElement(t, o.attrSrcset, n.srcset)
          }, this)), s.addClass(t, n.loadingClass), s.bindEvent(h, "error", v), s.bindEvent(h, "load", m), this.handleSrcsetElement(h, c, d)
        }
        var i = t("./utils.js"),
          s = t("./dom.js");
        n.exports = {
          handleSourceElement: function(t, e, n) {
            var o = s.getAttr(t, n);
            o && s.setAttr(t, e, o)
          },
          handleSrcsetElement: function(t, e, n) {
            n && s.setAttr(t, this.context.attrSrcset, n), t.src = e
          },
          loadElementSuccess: function(t) {
            var e = this.options;
            s.addClass(t, e.successClass), s.removeClass(t, e.loadingClass), e.success && e.success(t)
          },
          loadElementError: function(t, e) {
            var n = this.options;
            n.error && n.error(t, e), s.addClass(t, n.errorClass), s.removeClass(t, n.loadingClass)
          },
          loadElement: function(t, e) {
            var n = this.options,
              r = this.context;
            if (e || n.loadInvisible || t.offsetWidth > 0 && t.offsetHeight > 0) {
              var a = s.getAttr(t, r.source) || s.getAttr(t, n.src);
              a ? o.call(this, t, a, n, r) : (s.addClass(t, n.loadingClass), s.equal(t, "video") ? (i.each(t.getElementsByTagName("source"), function(t) {
                this.handleSourceElement(t, r.attrSrc, n.src)
              }, this), t.load(), this.loadElementSuccess(t)) : this.loadElementError(t, "missing"))
            }
          }
        }
      }), e("./utils.js", function(t, e, n) {
        var o = e.hasOwnProperty = Object.prototype.hasOwnProperty,
          i = e.toString = Object.prototype.toString,
          s = e.each = function(t, e, n) {
            if (t && e)
              for (var o = t.length, i = 0; i < o && !1 !== e.call(n, t[i], i); i++);
          };
        e.trim = function(t) {
          return t.replace(/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, "")
        }, e.assign = function(t) {
          for (var e = 1; e < arguments.length; e++) {
            var n = arguments[e];
            if (null != n)
              for (var i in n) o.call(n, i) && (t[i] = n[i])
          }
          return t
        }, e.isUndefined = function(t) {
          return void 0 === t
        }, s(["Arguments", "Function", "String", "Number", "Date", "RegExp", "Error"], function(t) {
          e["is" + t] = function(e) {
            return i.call(e) === "[object " + t + "]"
          }
        }), e.throttle = function(t, e, n) {
          var o = 0;
          return function() {
            var i = +new Date;
            i - o < e || (o = i, t.apply(n, arguments))
          }
        }, e.inView = function(t, e) {
          return t.right >= e.left && t.bottom >= e.top && t.left <= e.right && t.top <= e.bottom
        }
      }), "function" == typeof define && define.amd ? define(t("./index.js")) : "object" == typeof exports ? module.exports = t("./index.js") : window.HqyLazyload = t("./index.js")
    }();
    var AlbaLoadLazy = function() {
      var hqyLazy = new HqyLazyload({
        elements: document.querySelectorAll("[data-src]")
      })
    };
    AlbaLoadLazy();
  </script>
  <!-- Google tag (gtag.js) -->
  <script async="" src="https://www.googletagmanager.com/gtag/js?id=G-NFPGNSXVC8"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'G-NFPGNSXVC8');
  </script>
  <script type="text/javascript" src="https://shootz.yalla-shoot-tv.live/wp-content/themes/AlbaYallaShoot/js/jquery.min.js" id="AlbaJquery-js"></script>
  <script>
    const getOffsetTop = (element) => {
      const offset = element.offsetTop;
      return element.offsetParent ? offset + getOffsetTop(element.offsetParent) : offset;
    }

    function AlbaLoadMorPostScroall() {
      var hasMore = true;
      var proceed = true;
      var Nfeed = document.querySelector('.Nfeed');
      var url = Nfeed ? Nfeed.getAttribute('data-page') : '';
      var AlbaMorBtn = document.querySelector('.AlbaMorBtn');
      var AlbaPosts = document.querySelector('#AlbaPosts');
      var AlbaContainer = document.querySelector('.grid-post');
      var loadMoreNews = document.querySelector("#LoadMOreNews");

      function Albaloadfeed() {
        if (proceed && hasMore && url !== "undefined") {
          loadMoreNews.innerHTML = '<div class="spinner"><svg><use xlink:href="#spinner"></use></svg></div>';
          proceed = false;
          var xhr = new XMLHttpRequest();
          xhr.open("POST", url);
          xhr.onload = function() {
            if (this.response == "404") {
              hasMore = false;
            }
            else {
              var parser = new DOMParser();
              var htmlDocument = parser.parseFromString(this.response, "text/html");
              var section = htmlDocument.documentElement.querySelector(".Nfeed");
              url = section.getAttribute('data-page');
              AlbaPosts.appendChild(section);
              if (typeof AlbaLoadLazy !== "undefined") {
                AlbaLoadLazy();
              }
              if (url === '') {
                hasMore = false;
              }
              proceed = true;
            }
            if (hasMore != false) {
              loadMoreNews.innerHTML = 'عرض المزيد';
            } else {
              loadMoreNews.remove();
              AlbaMorBtn.innerHTML = '<span class="LoadMOreNews pagination-disabled">لا يوجد المزيد </span>';
            }
          };
          xhr.send();
        }
      }
      if (loadMoreNews) {
        loadMoreNews.addEventListener("click", function(e) {
          e.preventDefault();
          if (hasMore) Albaloadfeed();
          AlbaLoadLazy();
        });
      }
    }(function(funcName, baseObj) {
      AlbaLoadMorPostScroall();
    })("docReady", window);
  </script>
  <script>
    ! function() {
      function t() {
        if (this.complete) {
          const e = this.getAttribute("data-lazy-src");
          if (e && this.src !== e) return void this.addEventListener("onload", t);
          const n = this.width,
            d = this.height;
          n && n > 0 && d && d > 0 && (this.setAttribute("width", n), this.setAttribute("height", d), i(this))
        } else this.addEventListener("onload", t)
      }
      var e = function() {
          const e = document.querySelectorAll("img[data-recalc-dims]");
          for (let i = 0; i < e.length; i++) t.call(e[i])
        },
        i = function(t) {
          t.removeAttribute("data-recalc-dims"), t.removeAttribute("scale")
        };
      "undefined" != typeof window && "undefined" != typeof document && ("loading" === document.readyState ? document.addEventListener("DOMContentLoaded", e) : e()), document.body.addEventListener("is.post-load", e)
    }();
  </script>

  <div id="sqrx-content-container">
    <div class="squarex_ext_modal">
      <div class="squarex_ext_dialog-container">
        <div id="module_dialog_root__disposableFileViewer">
          <div class="squarex_ext_dialog squarex_ext_light squarex_ext__hidden"></div>
        </div>
      </div>
    </div>
  </div><sqrx-notification-bar id="sqrxNotificationBar" elemtitle="SquareX Safe File Viewer" class="hydrated"></sqrx-notification-bar><iframe allow="join-ad-interest-group" data-tagging-id="G-NFPGNSXVC8" data-load-time="1722611098345" height="0" width="0" src="https://td.doubleclick.net/td/ga/rul?tid=G-NFPGNSXVC8&amp;gacid=1263151597.1722599319&amp;gtm=45je47v0v9117558364za200&amp;dma=0&amp;gcd=13l3l3l3l1&amp;npa=0&amp;pscdl=noapi&amp;aip=1&amp;fledge=1&amp;frm=0&amp;tag_exp=95250752&amp;z=1786327247" style="display: none; visibility: hidden;"></iframe><sqrx-email-notifier variant="light" class="hydrated"></sqrx-email-notifier>
</body>

</html>