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
    console.log("clicked")
    document.querySelector("#side-nav")?.classList.toggle("translate-x-0")
})
