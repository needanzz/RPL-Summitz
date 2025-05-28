import { Link } from "react-router-dom";
import Navbar from "../components/Navbar";

const MoreTrips = () => {
  return (
    <section className='w-screen bg-white pb-10'>
        <Navbar />

        <div>
            <p className="text-black text-3xl font-bold text-center p-10">Pilih jadwal pendakian gunung impian anda!</p>
        </div>
    
        <div className='w-full flex justify-center mt-5'>
            <ul className='list-none grid grid-cols-4 gap-5 overflow-x-auto whitespace-nowrap scrollbar-hide px-5'>
                <li>
                    <Link to="/trips/$trip.id">
                        <div className="w-70 h-110 bg-amber-50 rounded-2xl overflow-hidden drop-shadow-xl">
                            <section className="bg-[url(https://i.pinimg.com/736x/7c/7c/51/7c7c51b2399f9f92524b3d77cd2ebea0.jpg)] bg-cover w-70 h-70 rounded-2xl"></section>
                                <section>
                                    <p className="text-start text-black mx-3 mt-3 mb-1">Gunung Rinjani</p>
                                    <p className="text-start font-light text-black mx-3">Nusa Tenggara Barat</p>
                                    <p className="text-start text-black text-lg mx-3 mt-14">IDR 1.500.000</p>
                                </section>
                        </div>
                    </Link>
                </li>

                <li>
                    <Link to="/trips/$trip.id">
                        <div className="w-70 h-110 bg-amber-50 rounded-2xl overflow-hidden drop-shadow-xl">
                            <section className="bg-[url(https://i.pinimg.com/736x/7c/7c/51/7c7c51b2399f9f92524b3d77cd2ebea0.jpg)] bg-cover w-70 h-70 rounded-2xl"></section>
                                <section>
                                    <p className="text-start text-black mx-3 mt-3 mb-1">Gunung Rinjani</p>
                                    <p className="text-start font-light text-black mx-3">Nusa Tenggara Barat</p>
                                    <p className="text-start text-black text-lg mx-3 mt-14">IDR 1.500.000</p>
                                </section>
                        </div>
                    </Link>
                </li>
                            
                <li>
                    <Link to="/trips/kerinci">
                        <div className="w-70 h-110 bg-amber-50 rounded-2xl overflow-hidden drop-shadow-xl">
                            <section className="bg-[url(https://i.pinimg.com/736x/b9/f2/f7/b9f2f7769f412d91ec7d6d9c54f8ce4a.jpg)] bg-cover w-70 h-70 rounded-2xl"></section>
                                <section>
                                    <p className="text-start text-black mx-3 mt-3 mb-1">Gunung Kerinci</p>
                                    <p className="text-start font-light text-black mx-3">Sumatera Barat</p>
                                    <p className="text-start text-black text-lg mx-3 mt-14">IDR 1.000.000</p>
                                </section>
                        </div>
                    </Link>
                </li>
    
                <li>
                    <Link to="/trips/gede">
                        <div className="w-70 h-110 bg-amber-50 rounded-2xl overflow-hidden drop-shadow-xl">
                            <section className="bg-[url(https://i.pinimg.com/736x/be/a6/74/bea674c93cf0a824d16e852a8bc82d69.jpg)] bg-cover w-70 h-70 rounded-2xl"></section>
                            <section>
                                <p className="text-start text-black mx-3 mt-3 mb-1">Gunung Gede</p>
                                <p className="text-start font-light text-black mx-3">Kab. Cianjur</p>
                                <p className="text-start text-black text-lg mx-3 mt-14">IDR 750.000</p>
                            </section>
                        </div>
                    </Link>
                </li>
    
                <li>
                    <Link to="/trips/pangrango">
                        <div className="w-70 h-110 bg-amber-50 rounded-2xl overflow-hidden drop-shadow-xl">
                            <section className="bg-[url(https://i.pinimg.com/736x/3b/54/6a/3b546a0b6cd9010f0afb88c9b9e677d7.jpg)] bg-cover w-70 h-70 rounded-2xl"></section>
                                <section>
                                    <p className="text-start text-black mx-3 mt-3 mb-1">Gunung Pangrango</p>
                                    <p className="text-start font-light text-black mx-3">Kab. Cianjur</p>
                                    <p className="text-start text-black text-lg mx-3 mt-14">IDR 750.000</p>
                            </section>
                        </div>
                    </Link>
                </li>
    
                <li>
                    <Link to="/trips/sumbing">
                        <div className="w-70 h-110 bg-amber-50 rounded-2xl overflow-hidden drop-shadow-xl">
                            <section className="bg-[url(https://i.pinimg.com/736x/2a/b5/50/2ab550be3f72a5b28971b6e17aaa6feb.jpg)] bg-cover w-70 h-70 rounded-2xl"></section>
                                <section>
                                    <p className="text-start text-black mx-3 mt-3 mb-1">Gunung Sumbing</p>
                                    <p className="text-start font-light text-black mx-3">Kota Temanggung</p>
                                    <p className="text-start text-black text-lg mx-3 mt-14">IDR 750.000</p>
                                </section>
                        </div>
                    </Link>
                </li>
            </ul>
        </div>
    </section>
  );
};

export default MoreTrips;