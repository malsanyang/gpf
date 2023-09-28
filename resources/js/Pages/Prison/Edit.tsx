import React, { useEffect } from "react";
import Layout from "../../Components/Layout/Layout";
import Breadcrumb from "../../Components/Shared/Breadcrumb";
import UserListProps from "../../Models/props_UserItem";
import { Head, useForm } from "@inertiajs/react";
import PrisonListProps from "../../Models/props_PrisonItem";

interface PrisonEditPageProps {
    prison: { data: PrisonListProps },
    currentUser: { data: UserListProps } | null,
}

const Edit = ({ prison, currentUser } : PrisonEditPageProps) => {
    const { data, setData, put, processing, errors} = useForm({id: 0, name: '', location: ''});

    useEffect(() => {
        setData({id: prison.data.id, name: prison.data.name, location: prison.data.location});
    }, [prison])

    function handleSubmit(e: any) {
        e.preventDefault();
        put(`/prisons/${prison.data.id}`);
    }

    return (
        <Layout currentUser={currentUser?.data}>
            <Head title={'Prisons Edit'} />

            <Breadcrumb paths={['prisons', 'edit']} />

            <div className="w-full max-w-full rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div className="max-w-full overflow-x-auto">
                    <div className="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
                        <form className="space-y-6" onSubmit={handleSubmit}>
                            <div>
                                <label htmlFor="name" className="mb-2.5 block text-black dark:text-white">Name</label>
                                <div className="mt-2">
                                    <input className="w-full rounded border-[1.5px] border-stroke bg-white py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                           id="name" value={data.name} autoComplete="name" required onChange={ e => setData('name', e.target.value)}
                                    />
                                </div>
                                { errors && errors.name !== undefined && (
                                    <div className="flex justify-between">
                                        <p className="w-full text-sm text-danger">{errors.name}</p>
                                    </div>
                                )}
                            </div>

                            <div>
                                <label htmlFor="location" className="mb-2.5 block text-black dark:text-white">Location</label>
                                <div className="mt-2">
                                    <input className="w-full rounded border-[1.5px] border-stroke bg-white py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                           id="location" type={'text'} value={data.location} autoComplete="location" required onChange={ e => setData('location', e.target.value)}
                                    />
                                </div>
                                { errors && errors.location !== undefined && (
                                    <div className="flex justify-between">
                                        <p className="w-full text-sm text-danger">{errors.location}</p>
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