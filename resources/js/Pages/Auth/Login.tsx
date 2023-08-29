import React from "react";
import {Head, useForm} from "@inertiajs/react";

const Login = () => {
    const { data, setData, post, processing, errors} = useForm({email: '', password: ''});

    function authenticate(e: any) {
        e.preventDefault();
        post('/auth/authenticate');
    }

    return (
        <>
            <Head title={'Login'} />

            <div className="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
                <div className="sm:mx-auto sm:w-full sm:max-w-sm">
                    <img className="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company" />
                    <h2 className="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account</h2>
                </div>

                <div className="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form className="space-y-6" onSubmit={authenticate}>
                        <div>
                            <label htmlFor="email" className="mb-2.5 block text-black dark:text-white">Email address</label>
                            <div className="mt-2">
                                <input className="w-full rounded border-[1.5px] border-stroke bg-white py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                       id="email" value={data.email} autoComplete="email" required onChange={ e => setData('email', e.target.value)}
                                       />
                            </div>
                        </div>

                        <div>
                            <div className="flex items-center justify-between">
                                <label htmlFor="password" className="mb-2.5 block text-black dark:text-white">Password</label>
                                <div className="text-sm">
                                    <a href="#" className="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                                </div>
                            </div>
                            <div className="mt-2">
                                <input className="w-full rounded border-[1.5px] border-stroke bg-white py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                       id="password" type="password" autoComplete="current-password" value={data.password} onChange={e => setData('password', e.target.value)}
                                       required
                                        />
                            </div>
                        </div>

                        { errors && errors.email !== undefined && (
                            <div>
                                <div className="flex items-center justify-between">
                                    <p className="w-full text-center text-sm text-danger">{errors.email}</p>
                                </div>
                            </div>
                        )}

                        <div>
                            <button type="submit" disabled={processing}
                                    className="flex w-full inline-flex items-center justify-center rounded-md bg-primary py-4 px-10 text-center font-medium text-white hover:bg-opacity-90 lg:px-8 xl:px-10">
                                Sign in
                            </button>
                        </div>
                    </form>

                    <p className="mt-10 text-center text-sm text-gray-500">
                        All right reserved &copy; 2023
                    </p>
                </div>
            </div>
        </>
    )
};

export default Login

