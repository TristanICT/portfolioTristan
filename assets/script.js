document.querySelectorAll("[data-tabs]").forEach((tabs) => {
    const buttons = tabs.querySelectorAll("[data-tab]");
    const panels = tabs.querySelectorAll("[data-panel]");

    buttons.forEach((button) => {
        button.addEventListener("click", () => {
            const activeTab = button.getAttribute("data-tab");

            buttons.forEach((item) => {
                const isActive = item === button;
                item.classList.toggle("is-active", isActive);
                item.setAttribute("aria-selected", String(isActive));
            });

            panels.forEach((panel) => {
                panel.classList.toggle("is-active", panel.getAttribute("data-panel") === activeTab);
            });
        });
    });
});
