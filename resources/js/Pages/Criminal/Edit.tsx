import React, { useEffect } from "react";
import Layout from "../../Components/Layout/Layout";
import Breadcrumb from "../../Components/Shared/Breadcrumb";
import UserListProps from "../../Models/props_UserItem";
import { Head, useForm } from "@inertiajs/react";
import CriminalListProps from "../../Models/props_CriminalItem";

interface CriminalEditPageProps {
    criminal: { data: CriminalListProps },
    currentUser: { data: UserListProps } | null,
}

const Edit = ({ criminal, currentUser } : CriminalEditPageProps) => {
    const { data, setData, put, processing, errors} = useForm<any>({
        id: '',
        firstName: '',
        lastName: '',
        address: '',
        telephoneNo: '',
        dob: ''
    });

    useEffect(() => {
        setData({
            id: criminal.data.id,
            firstName: criminal.data.firstName,
            lastName: criminal.data.lastName,
            address: criminal.data.address,
            telephoneNo: criminal.data.telephoneNo,
            dob: criminal.data.dob
        });
    }, [criminal])

    function handleSubmit(e: any) {
        e.preventDefault();
        put(`/criminals/${criminal.data.id}`);
    }

    return (
        <Layout currentUser={currentUser?.data}>
            <Head title={'Criminals Edit'} />

            <Breadcrumb paths={['criminals', 'edit']} />

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
                                           id="dob" type={'date'} defaultValue={new Date(data.dob).toDateString()} autoComplete="dob" required onChange={ e => setData(data => ({...data, dob: e.target.value}))}
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
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </Layout>
    )
};

export default Edit;
