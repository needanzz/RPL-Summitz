import { Link } from "react-router-dom";

const SignUp = () => {
  return (
    <section className="w-screen h-screen bg-white">
      <div className="flex w-screen h-screen mx-auto bg-[url('/images/bromo.jpg')] bg-cover">
        {/* Sesi kiri */}
        <div className="w-1/2 bg-transparent"></div>
        <section className="w-1/2 flex flex-col justify-center items-center bg-blue-700 rounded-l-4xl">
            <div className="w-full flex flex-col justify-center mb-20">
                <h1 className="font-poppins-semibold text-white p-10">Sign up</h1>
            </div>

            <div className="w-3/4 flex flex-col justify-center">
                <div className="mb-5">
                    <input type="text" className="w-full h-14 rounded-full text-black font-poppins-semibold bg-white p-6" placeholder="E-mail"/>
                </div>

                <div className="mb-5">
                    <input type="password" className="w-full h-14 rounded-full text-black font-poppins-semibold bg-white p-6" placeholder="Password"/>
                </div>

                <div className="mb-5">
                    <button className="w-full h-14 rounded-full bg-blue-700 text-white font-poppins-semibold">Sign up</button>
                </div>

                <div className="flex justify-end mt-5">
                    <p className="font-poppins-semibold text-sm text-white">Sudah punya akun? <Link to="/sign-in">Sign in!</Link></p>
                </div>
            </div>
        </section>
      </div>
    </section>
  )
}

export default SignUp