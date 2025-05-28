import { Link } from 'react-router-dom';

const Footer = () => {
    return (
        <footer className="bg-[#3559C7] w-full flex flex-col justify-center py-10">
            {/* Top Section */}
            <div className="grid grid-cols-1 md:grid-cols-3 gap-5 px-10 pb-10 justify-center items-center">
                {/* Logo + Slogan */}
                <div className="flex flex-col justify-center items-center md:items-start gap-5">
                    <img src="/images/logo.png" alt="Logo" className="w-64" />
                </div>

                {/* Social Media */}
                <div className="flex flex-col gap-5 justify-center items-center">
                    <span className='font-poppins-semibold text-lg'>Social media</span>
                    <div className="grid grid-cols-4 gap-4">
                        <a href="#"><img src="/images/tiktok.png" alt="TikTok" className="w-14" /></a>
                        <a href="#"><img src="/images/instagram.png" alt="Instagram" className="w-14" /></a>
                        <a href="#"><img src="/images/x.png" alt="X" className="w-14" /></a>
                        <a href="#"><img src="/images/facebook.png" alt="Facebook" className="w-14" /></a>
                    </div>
                </div>

                {/* Peta */}
                <div className="flex justify-center md:justify-end items-center">
                    <div className="rounded-2xl overflow-hidden w-60 h-60 bg-white flex items-center justify-center">
                        <img src="/images/map.png" alt="Map" className="w-full h-full object-cover" />
                    </div>
                </div>
            </div>

            {/* Divider */}
            <div className="border-t border-white mx-10 my-4" />

            {/* Bottom Menu */}
            <div className="flex flex-col md:flex-row justify-between items-center px-10 gap-4">
                <nav className="flex gap-8 text-white font-semibold text-base">
                    <Link to="/">Home</Link>
                    <Link to="/about">About</Link>
                    <Link to="/contact">Contact</Link>
                    <Link to="/more-trip">Trip</Link>
                </nav>
                <p className="text-white text-sm mt-2 md:mt-0">© Summitz 2025</p>
            </div>
        </footer>
    );
};

export default Footer;
