/**
 * Entry TOC plugin for Craft CMS 4.x
 *
 * A field type for Craft CMS that creates a table of contents on long Neo and Matrix fields
 *
 * @link     https://www.imarc.com
 * @copyright Copyright (c) 2023 Linnea Hartsuyker
 */

function toggleToc(hideAll) {
    let tocs = document.querySelectorAll(".toc");
    console.log(tocs)
    tocs.forEach(function(toc) {
        if (hideAll) {
            toc.classList.add('hidden')
        } else {
            let field = document.querySelector(`#fields-${toc.id}-label`)
            let parent = field.closest('.flex-fields')
            if (parent.classList.contains('hidden')) {
                toc.classList.add('hidden')
            } else {
                toc.classList.remove('hidden')
            }
        }
    })
}

const accordionItemHeaders = document.querySelectorAll(".accordion-item-header");

accordionItemHeaders.forEach(accordionItemHeader => {
  accordionItemHeader.addEventListener("click", event => {
    
    accordionItemHeader.classList.toggle("active");
    const accordionItemBody = accordionItemHeader.nextElementSibling;
    if(accordionItemHeader.classList.contains("active")) {
      accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
    }
    else {
      accordionItemBody.style.maxHeight = 0;
    }
    
  });
});

let tocs = document.querySelectorAll(".toc");
if (tocs[0].closest(".slideout-container")) {
    toggleToc(true)
} else {
    toggleToc(false)

    let tabs = document.querySelectorAll("[role='tab']");
    console.log(tabs)
    tabs.forEach(function(tab) {
        tab.addEventListener('click', function(e) {
            toggleToc(false)
        })
    })

    let els = document.querySelectorAll(".tocitem");
    els.forEach(function(el) {
        el.addEventListener('click', function(e) {
            e.preventDefault()
            let id = el.getAttribute('href').replace('#', '')
            var target = document.querySelector(`[data-neo-b-id="${id}"]`)
            if (!target) {
                var target = document.querySelector(`[data-id="${id}"]`)
            }
            target.scrollIntoView({ behavior: 'smooth'});
        });
    });
}

