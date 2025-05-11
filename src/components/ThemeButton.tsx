import gsap from "gsap"
import { Moon, Sun } from "lucide-react"
import { useEffect, useRef, useState } from "react"

export const ThemeButton = () => {
    const [darkMode, setDarkMode] = useState(false)
    const knobRef = useRef<HTMLDivElement>(null)

    const toggleSwitch = () => {
        const newMode = !darkMode
        setDarkMode(newMode)
        localStorage.setItem("theme", newMode ? "dark" : "light")
    }

    useEffect(() => {
        if (darkMode) {
            document.documentElement.classList.add("dark")
        } else {
            document.documentElement.classList.remove("dark")
        }

        // Animate toggle knob
        gsap.to(knobRef.current, {
            x: darkMode ? 0 : 32, // adjust based on the button width
            duration: 0.3,
            ease: "power2.out",
        })
    }, [darkMode])

    useEffect(() => {
        setDarkMode(localStorage.getItem("theme") === "dark")
    }, [])

    return (
        <button
            suppressHydrationWarning
            className="relative flex w-16 overflow-hidden rounded-full bg-gray-300 p-1 dark:bg-gray-600"
            onClick={toggleSwitch}
        >
            <div ref={knobRef} className="absolute top-1 left-1 flex h-7 w-7 items-center justify-center rounded-full bg-white shadow-md">
                {darkMode ? <Moon className="fill-current text-blue-800" /> : <Sun className="fill-current text-yellow-400" />}
            </div>
        </button>
    )
}
