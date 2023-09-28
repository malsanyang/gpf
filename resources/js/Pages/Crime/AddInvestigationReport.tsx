import React, { useEffect } from "react";
import Layout from "../../Components/Layout/Layout";
import Breadcrumb from "../../Components/Shared/Breadcrumb";
import UserListProps from "../../Models/props_UserItem";
import { Head, useForm } from "@inertiajs/react";
import CrimeListProps from "../../Models/props_CrimeItem";
import CourtListProps from "../../Models/props_CourtItem";

interface CrimeAddInvestigationReportPageProps {
    crime: { data: CrimeListProps },
    currentUser: { data: UserListProps } | null,
    prosecutors: { data: Array<UserListProps> },
    courts: { data: Array<CourtListProps> }
}

const AddInvestigationReport = ({ crime, currentUser, prosecutors, courts } : CrimeAddInvestigationReportPageProps) => {
    const { data, setData, put, processing, errors} = useForm({
        id: 0,
        investigationReport: '',
        prosecutorId: 0,
        courtId: 0,
    });

    useEffect(() => {
        setData({
            id: crime.data.id,
            investigationReport: crime.data.investigationReport ?? '',
            prosecutorId: crime.data.prosecutor.data.id ?? 0,
            courtId: crime.data.court.data.id ?? 0,
        });
    }, [crime])

    function handleSubmit(e: any) {
        e.preventDefault();
        put(`/crimes/${crime.data.id}/add-investigation-report`);
    }

    return (
        <Layout currentUser={currentUser?.data}>
            <Head title={'Crime Add Investigation Report'} />

            <Breadcrumb paths={['crimes', 'add-investigation-report']} />

            <div className="w-full max-w-full rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div className="max-w-full overflow-x-auto">
                    <div className="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
                        <form className="space-y-6" onSubmit={handleSubmit}>
                            <div>
                                <label htmlFor="investigationReport" className="mb-2.5 block text-black dark:text-white">Report</label>
                                <div className="mt-2">
                                    <textarea className="w-full rounded border-[1.5px] border-stroke bg-white py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                           id="investigationReport" value={data.investigationReport} autoComplete="investigationReport" required onChange={ e => setData( data => ({...data, investigationReport: e.target.value}))}
                                    />
                                </div>
                                { errors && errors.investigationReport !== undefined && (
                                    <div className="flex justify-between">
                                        <p className="w-full text-sm text-danger">{errors.investigationReport}</p>
                                    </div>
                                )}
                            </div>

                            <div>
                                <label htmlFor="prosecutorId" className="mb-2.5 block text-black dark:text-white">Prosecutor</label>
                                <div className="mt-2">
                                    <select className="w-full rounded border-[1.5px] border-stroke bg-white py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                           id="prosecutorId" value={data.prosecutorId} autoComplete="prosecutorId" required onChange={ e => setData( data => ({...data, prosecutorId: e.target.value}))}
                                    >
                                        <option value={0}>Please select a prosecutor</option>
                                        { prosecutors.data.map((prosecutor, index) => {
                                            return (<option key={index} value={prosecutor.id}>{`${prosecutor.fullName} (${prosecutor.email})`}</option>)
                                        })}
                                    </select>
                                </div>
                                { errors && errors.prosecutorId !== undefined && (
                                    <div className="flex justify-between">
                                        <p className="w-full text-sm text-danger">{errors.prosecutorId}</p>
                                    </div>
                                )}
                            </div>

                            <div>
                                <label htmlFor="courtId" className="mb-2.5 block text-black dark:text-white">Court</label>
                                <div className="mt-2">
                                    <select className="w-full rounded border-[1.5px] border-stroke bg-white py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                           id="courtId" value={data.courtId} autoComplete="courtId" required onChange={ e => setData( data => ({...data, courtId: e.target.value}))}
                                    >
                                        <option value={0}>Please select a court</option>
                                        { courts.data.map((court, index) => {
                                            return (<option key={index} value={court.id}>{`${court.name} (${court.courtNo})`}</option>)
                                        })}
                                    </select>
                                </div>
                                { errors && errors.courtId !== undefined && (
                                    <div className="flex justify-between">
                                        <p className="w-full text-sm text-danger">{errors.courtId}</p>
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

export default AddInvestigationReport;
