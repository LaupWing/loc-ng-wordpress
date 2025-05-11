import ReactDOM from "react-dom/client"
import { ThemeButton } from "./components/ThemeButton"

setTimeout(() => {
    document.body.classList.add("fade-in-start")
}, 100)

if (document.querySelector(".theme-button")) {
    const root = ReactDOM.createRoot(document.querySelector(".theme-button")!)
    root.render(<ThemeButton />)
}
