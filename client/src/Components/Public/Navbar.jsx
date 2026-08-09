import { useState, useEffect } from "react";
import { Menu } from "lucide-react";

export default function Navbar(){
    const links = [
        {name: "Home", id: "home"},
        {name: "About", id: "about"},
        {name: "Projects", id: "projects"},
        {name: "Contact", id: "contact"}
    ]; // link navbar

    const [activeLink, setActiveLink] = useState("home"); // state menu aktif & update menu aktif
    useEffect(() => {
        const sections = document.querySelectorAll("section[id]"); // seleksi semua section berdasarkan id

        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if(entry.isIntersecting){
                        setActiveLink(entry.target.id)
                    }
                });
            },{ threshold: 0.25,}
        );
        sections.forEach((section) => observer.observe(section));
        return()=> observer.disconnect(); 
    }, []);

    return(
        <nav className="bg-transparent w-full fixed top-0 left-0 z-999">
            <div className="md:flex items-center justify-between py-2 md:px-10 px-7">
                {/* LEFT */}
                <div className="font-bold text-2xl flex items-center font-[Poppins] text-black ml-10">
                    <h2>AUREN</h2>
                </div>
            </div>
        </nav>
    )
}