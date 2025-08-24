document.addEventListener("DOMContentLoaded", function () {
    const menu = document.querySelector(".primary_menu");
    const burgerBtn = document.querySelector(".primary_menu_burger_button");
    const dropdownPanel = document.getElementById("burgerDropdownPanel");

    let hiddenItems = [];
    let burgerOpen = false;

    const collapseMenuItems = () => {
        const liItems = Array.from(menu.children);
        const screenWidth = window.innerWidth;

        // Reset
        liItems.forEach(li => {
            li.style.display = "inline-block";
            li.classList.remove("burger-hidden");
        });

        hiddenItems = [];
        dropdownPanel.innerHTML = "";

        if (screenWidth < 1600) {
            let itemsToHide = Math.ceil((1600 - screenWidth) / 100) * 1;

            for (let i = liItems.length - 1; i >= liItems.length - itemsToHide; i--) {
                if (liItems[i]) {
                    liItems[i].style.display = "none";
                    liItems[i].classList.add("burger-hidden");
                    hiddenItems.push(liItems[i]);
                }
            }
        }

        burgerBtn.style.display = hiddenItems.length > 0 ? "flex" : "none";
        dropdownPanel.classList.remove("show");
        burgerOpen = false;
    };

    collapseMenuItems();
    window.addEventListener("resize", collapseMenuItems);

    burgerBtn.addEventListener("click", function () {
        burgerOpen = !burgerOpen;

        if (burgerOpen) {
            dropdownPanel.innerHTML = ""; // Clear old
            [...hiddenItems].reverse().forEach(li => {
                const link = li.querySelector("a");
                if (link) {
                    const clonedLink = link.cloneNode(true);
                    dropdownPanel.appendChild(clonedLink);
                }
            });
            dropdownPanel.classList.add("show");
        } else {
            dropdownPanel.classList.remove("show");
        }
    });

    document.addEventListener("click", function (e) {
        if (!burgerBtn.contains(e.target) && !dropdownPanel.contains(e.target)) {
            dropdownPanel.classList.remove("show");
            burgerOpen = false;
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const headerEl = document.querySelector("header");
    if (!headerEl) return;

    const applyShadow = () => {
        if (window.scrollY > 0) {
            headerEl.classList.add("has-shadow");
        } else {
            headerEl.classList.remove("has-shadow");
        }
    };

    // run once on load (in case we land mid-page)
    applyShadow();

    // listen for scroll
    window.addEventListener("scroll", applyShadow, { passive: true });
});


document.addEventListener("DOMContentLoaded", function () {
    // 1) Collect items to reveal
    // Add .reveal to anything you want animated. We’ll also auto-pick some common blocks here:
    const candidates = [
        ...document.querySelectorAll(
            // common first-screen areas
            "header, .page-wrap .container > *, .newsletter-list li, footer"
        ),
        // elementor top containers, if present
        ...document.querySelectorAll(".elementor .e-parent")
    ];

    // Ensure each has the class (if you want to mark manually in templates, skip this loop)
    candidates.forEach((el) => el.classList.add("reveal"));

    // 2) IntersectionObserver to add .in when visible
    const io = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    // optional: stagger siblings by index
                    const parent = entry.target.parentElement;
                    const index = parent ? Array.from(parent.children).indexOf(entry.target) : 0;
                    entry.target.style.setProperty("--d", `${Math.min(index * 60, 420)}ms`);
                    entry.target.classList.add("in");
                    io.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.12 }
    );

    document.querySelectorAll(".reveal").forEach((el) => io.observe(el));
});

// 3) Preloader: hide when everything is loaded (images, etc.)
window.addEventListener("load", function () {
    const pre = document.getElementById("preloader");
    if (!pre) return;
    // small delay feels smoother; tweak as you like
    setTimeout(() => {
        pre.classList.add("is-hidden");
        // remove from DOM after transition
        setTimeout(() => pre.remove(), 350);
    }, 150);
});


