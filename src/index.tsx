import ReactDOM from "react-dom/client"
import { ThemeButton } from "./components/ThemeButton"

setTimeout(() => {
    document.body.classList.add("fade-in-start")
}, 100)

if (document.querySelector(".theme-button")) {
    document.querySelectorAll(".theme-button").forEach((el) => {
        const root = ReactDOM.createRoot(el!)
        root.render(<ThemeButton />)
    })
}

if (/^\/blogs\/[a-zA-Z]+\/.*$/.test(window.location.pathname)) {
    document.querySelectorAll(".menu li").forEach((li) => {
        if (li.textContent?.includes("Blogs")) {
            li.classList.add("current-menu-item")
        }
    })
}

document.querySelector("#mobile-menu")?.addEventListener("click", () => {
    document.querySelector("#side-nav")?.classList.add("translate-x-0")
})
document.querySelector("#close")?.addEventListener("click", () => {
    document.querySelector("#side-nav")?.classList.remove("translate-x-0")
})
