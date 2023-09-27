import React from "react";
import Layout from "../../Components/Layout/Layout";
import Breadcrumb from "../../Components/Shared/Breadcrumb";
import UserListProps from "../../Models/props_UserItem";
import {Head, useForm} from "@inertiajs/react";

interface CriminalCreatePageProps {
    currentUser: { data: UserListProps } | null,
}

const Create = ({ currentUser } : CriminalCreatePageProps) => {
    const { data, setData, post, processing, errors} = useForm({
        firstName: '',
        lastName: '',
        address: '',
        telephoneNo: '',
        dob: ''
    });

    function handleSubmit(e: any) {
        e.preventDefault();
        post('/criminals');
    }

    return (
        <Layout currentUser={currentUser?.data}>
            <Head title={'Criminal Create'} />

            <Breadcrumb paths={['criminals', 'create']} />

            <div className="w-full max-w-full rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div className="max-w-full overflow-x-auto">
                    <div className="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
                        <form className="space-y-6" onSubmit={handleSubmit}>
                            <div>
                                <label htmlFor="firstName" className="mb-2.5 block text-black dark:text-white">First Name</label>
                                <div className="mt-2">
                                    <input className="w-full rounded border-[1.5px] border-stroke bg-white py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                           id="firstName" value={data.firstName} autoComplete="firstName" required onChange={ e => setData(data => ({...data, firstName: e.target.value}))}
                                    />
                                </div>
                                { errors && errors.firstName !== undefined && (
                                    <div className="flex justify-between">
                                        <p className="w-full text-sm text-danger">{errors.firstName}</p>
                                    </div>
                                )}
                            </div>

                            <div>
                                <label htmlFor="lastName" className="mb-2.5 block text-black dark:text-white">Last Name</label>
                                <div className="mt-2">
                                    <input className="w-full rounded border-[1.5px] border-stroke bg-white py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                           id="lastName" value={data.lastName} autoComplete="lastName" required onChange={ e => setData(data => ({...data, lastName: e.target.value}))}
                                    />
                                </div>
                                { errors && errors.lastName !== undefined && (
                                    <div className="flex justify-between">
                                        <p className="w-full text-sm text-danger">{errors.lastName}</p>
                                    </div>
                                )}
                            </div>

                            <div>
                                <label htmlFor="address" className="mb-2.5 block text-black dark:text-white">Address</label>
                                <div className="mt-2">
                                    <input className="w-full rounded border-[1.5px] border-stroke bg-white py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                           id="address" value={data.address} autoComplete="address" required onChange={ e => setData(data => ({...data, address: e.target.value}))}
                                    />
                                </div>
                                { errors && errors.address !== undefined && (
                                    <div className="flex justify-between">
                                        <p className="w-full text-sm text-danger">{errors.address}</p>
                                    </div>
                                )}
                            </div>

                            <div>
                                <label htmlFor="telephoneNo" className="mb-2.5 block text-black dark:text-white">Telephone No.</label>
                                <div className="mt-2">
                                    <input className="w-full rounded border-[1.5px] border-stroke bg-white py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                           id="telephoneNo" value={data.telephoneNo} autoComplete="telephoneNo" required onChange={ e => setData(data => ({...data, telephoneNo: e.target.value}))}
                                    />
                                </div>
                                { errors && errors.telephoneNo !== undefined && (
                                    <div className="flex justify-between">
                                        <p className="w-full text-sm text-danger">{errors.telephoneNo}</p>
                                    </div>
                                )}
                            </div>

                            <div>
                                <label htmlFor="dob" className="mb-2.5 block text-black dark:text-white">DOB</label>
                                <div className="mt-2">
                                    <input className="w-full rounded border-[1.5px] border-stroke bg-white py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                           id="dob" type={'date'} value={data.dob} autoComplete="dob" required onChange={ e => setData(data => ({...data, dob: e.target.value}))}
                                    />
                                </div>
                                { errors && errors.dob !== undefined && (
                                    <div className="flex justify-between">
                                        <p className="w-full text-sm text-danger">{errors.dob}</p>
                                    </div>
                                )}
                            </div>

                            <div>
                                <button type="submit" disabled={processing}
                                        className="flex w-full inline-flex items-center justify-center rounded-md bg-primary py-4 px-10 text-center font-medium text-white hover:bg-opacity-90 lg:px-8 xl:px-10">
                                    Create
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </Layout>
    )
};

export default Create;
