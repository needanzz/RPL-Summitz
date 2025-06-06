// import {useParams} from "react-router-dom";
// import { trips } from "../data/Trip";

export function Detail(){
    // const { id } = useParams();
    // const trip = trips.find((trip) => trip.id === parseInt(id));

    // if (!trip) {
    //     return <p>Trip not found</p>;
    // }

    return(
        <div className="trip-detail h-dvh w-dvw bg-gray-100">
            <section className="mb-10 pt-10">
                
                <div className="container w-11/12 h-96 mx-auto grid grid-cols-5 grid-rows-2 gap-2 rounded-2xl overflow-hidden">
                    <div className="col-span-2 row-span-2">
                        <img src="/images/merbabu.jpg" alt="" className="w-full h-full bg-cover"/>
                    </div>
                    <div className="flex flex-col gap-2">
                        <img src="/images/background.jpg" alt="" className="object-cover h-48" />
                        <img src="/images/gunungGede.jpg" alt="" className="object-cover h-48" />
                    </div>
                    <div className="col-span-2 row-span-2 bg-[url(/images/gunungRinjani.jpg)] bg-cover relative">
                        <span className="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white font-bold text-2xl">
                            Lihat lainnya
                        </span>
                    </div>
                </div>

            </section>

            <section classname="mb-10">
                <p className="text-start text-4xl text-black font-poppins-semibold px-14">Trip Gunung Merbabu</p>
            </section>

            <section></section>
        </div>
    );
}

export default Detail;