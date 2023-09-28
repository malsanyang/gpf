import React from "react";
import Layout from "../../Components/Layout/Layout";
import Breadcrumb from "../../Components/Shared/Breadcrumb";
import UserListProps from "../../Models/props_UserItem";
import {Head, useForm} from "@inertiajs/react";
import CitizenListProps from "../../Models/props_CitizenItem";
import CriminalListProps from "../../Models/props_CriminalItem";

interface CrimeCreatePageProps {
    currentUser: { data: UserListProps } | null,
    citizens: { data : Array<CitizenListProps> },
    criminals: { data : Array<CriminalListProps> },
    investigators: { data: Array<UserListProps> },
}

const Create = ({ currentUser, citizens, criminals, investigators } : CrimeCreatePageProps) => {
    const { data, setData, post, processing, errors} = useForm({
        crimeType: '',
        location: '',
        description: '',
        reportedBy: 0,
        witnessedBy: '',
        criminalId: '',
        investigatorId: '',
    });

    function handleSubmit(e: any) {
        e.preventDefault();
        post('/crimes');
    }

    return (
        <Layout currentUser={currentUser?.data}>
            <Head title={'Crime Create'} />

            <Breadcrumb paths={['crimes', 'create']} />

            <div className="w-full max-w-full rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div className="max-w-full overflow-x-auto">
                    <div className="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
                        <form className="space-y-6" onSubmit={handleSubmit}>
                            <div>
                                <label htmlFor="crimeType" className="mb-2.5 block text-black dark:text-white">Crime Type</label>
                                <div className="mt-2">
                                    <select className="w-full rounded border-[1.5px] border-stroke bg-white py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                           id="crimeType" value={data.crimeType} autoComplete="crimeType" required onChange={ e => setData(data => ({...data, crimeType: e.target.value}))}
                                    >
                                        <option value={''}>Please select crime type</option>
                                        <option value={'Murder'}>Murder</option>
                                        <option value={'Rubery'}>Rubery</option>
                                        <option value={'Theft'}>Theft</option>
                                    </select>
                                </div>
                                { errors && errors.crimeType !== undefined && (
                                    <div className="flex justify-between">
                                        <p className="w-full text-sm text-danger">{errors.crimeType}</p>
                                    </div>
                                )}
                            </div>

                            <div>
                                <label htmlFor="location" className="mb-2.5 block text-black dark:text-white">Location</label>
                                <div className="mt-2">
                                    <input className="w-full rounded border-[1.5px] border-stroke bg-white py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                           id="location" value={data.location} autoComplete="location" required onChange={ e => setData(data => ({...data, location: e.target.value}))}
                                    />
                                </div>
                                { errors && errors.location !== undefined && (
                                    <div className="flex justify-between">
                                        <p className="w-full text-sm text-danger">{errors.location}</p>
                                    </div>
                                )}
                            </div>

                            <div>
                                <label htmlFor="description" className="mb-2.5 block text-black dark:text-white">Description</label>
                                <div className="mt-2">
                                    <textarea className="w-full rounded border-[1.5px] border-stroke bg-white py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                           id="description" value={data.description} autoComplete="description" required onChange={ e => setData(data => ({...data, description: e.target.value}))}
                                    />
                                </div>
                                { errors && errors.description !== undefined && (
                                    <div className="flex justify-between">
                                        <p className="w-full text-sm text-danger">{errors.description}</p>
                                    </div>
                                )}
                            </div>

                            <div>
                                <label htmlFor="reportedBy" className="mb-2.5 block text-black dark:text-white">Reported By</label>
                                <div className="mt-2">
                                    <select className="w-full rounded border-[1.5px] border-stroke bg-white py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                           id="reportedBy" value={data.reportedBy} autoComplete="reportedBy" required onChange={ e => setData(data => ({...data, reportedBy: e.target.value}))}
                                    >
                                        <option value={0}>Please select a citizen</option>
                                        { citizens.data.map((citizen, index) => {
                                            return (<option key={index} value={citizen.id}>{`${citizen.fullName} (${citizen.telephoneNo})`}</option>)
                                        })}
                                    </select>
                                </div>
                                { errors && errors.reportedBy !== undefined && (
                                    <div className="flex justify-between">
                                        <p className="w-full text-sm text-danger">{errors.reportedBy}</p>
                                    </div>
                                )}
                            </div>

                            <div>
                                <label htmlFor="witnessedBy" className="mb-2.5 block text-black dark:text-white">Witnessed By</label>
                                <div className="mt-2">
                                    <input className="w-full rounded border-[1.5px] border-stroke bg-white py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                           id="witnessedBy" value={data.witnessedBy} autoComplete="witnessedBy" required onChange={ e => setData(data => ({...data, witnessedBy: e.target.value}))}
                                    />
                                </div>
                                { errors && errors.witnessedBy !== undefined && (
                                    <div className="flex justify-between">
                                        <p className="w-full text-sm text-danger">{errors.witnessedBy}</p>
                                    </div>
                                )}
                            </div>

                            <div>
                                <label htmlFor="criminalId" className="mb-2.5 block text-black dark:text-white">Criminal</label>
                                <div className="mt-2">
                                    <select className="w-full rounded border-[1.5px] border-stroke bg-white py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                           id="criminalId" value={data.criminalId} autoComplete="criminalId" required onChange={ e => setData(data => ({...data, criminalId: e.target.value}))}
                                    >
                                        <option value={0}>Please select a criminal</option>
                                        { criminals.data.map((criminal, index) => {
                                            return (<option key={index} value={criminal.id}>{`${criminal.fullName} (${criminal.address}: ${new Date(criminal.dob).toLocaleDateString()})`}</option>)
                                        })}
                                    </select>
                                </div>
                                { errors && errors.criminalId !== undefined && (
                                    <div className="flex justify-between">
                                        <p className="w-full text-sm text-danger">{errors.criminalId}</p>
                                    </div>
                                )}
                            </div>

                            <div>
                                <label htmlFor="investigatorId" className="mb-2.5 block text-black dark:text-white">Assign To Investigator</label>
                                <div className="mt-2">
                                    <select className="w-full rounded border-[1.5px] border-stroke bg-white py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                            id="investigatorId" value={data.investigatorId} autoComplete="investigatorId" required onChange={ e => setData(data => ({...data, investigatorId: e.target.value}))}
                                    >
                                        <option value={0}>Please select an investigator</option>
                                        { investigators.data.map((investigator, index) => {
                                            return (<option key={index} value={investigator.id}>{`${investigator.fullName} (${investigator.email})`}</option>)
                                        })}
                                    </select>
                                </div>
                                { errors && errors.investigatorId !== undefined && (
                                    <div className="flex justify-between">
                                        <p className="w-full text-sm text-danger">{errors.investigatorId}</p>
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
