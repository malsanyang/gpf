import React, { useEffect } from "react";
import Layout from "../../Components/Layout/Layout";
import Breadcrumb from "../../Components/Shared/Breadcrumb";
import UserListProps from "../../Models/props_UserItem";
import { Head, useForm } from "@inertiajs/react";
import CitizenListProps from "../../Models/props_CitizenItem";
import CrimeListProps from "../../Models/props_CrimeItem";
import CourtListProps from "../../Models/props_CourtItem";
import PrisonListProps from "../../Models/props_PrisonItem";

interface CrimeAddProsecutionReportPageProps {
    crime: { data: CrimeListProps },
    currentUser: { data: UserListProps } | null,
    prisons: { data: Array<PrisonListProps> },
}

const AddProsecutionReport = ({ crime, currentUser, prisons } : CrimeAddProsecutionReportPageProps) => {
    const { data, setData, put, processing, errors} = useForm({
        id: 0,
        prosecutionReport: '',
        courtDecision: '',
        prisonId: 0,
    });

    useEffect(() => {
        setData({
            id: crime.data.id,
            prosecutionReport: crime.data.prosecutionReport ?? '',
            courtDecision: '',
            prisonId: crime.data.prison.data.id ?? 0,
        });
    }, [crime])

    function handleSubmit(e: any) {
        e.preventDefault();
        put(`/crimes/${crime.data.id}/add-prosecution-report`);
    }

    return (
        <Layout currentUser={currentUser?.data}>
            <Head title={'Crime Add Prosecution Report'} />

            <Breadcrumb paths={['crimes', 'add-prosecution-report']} />

            <div className="w-full max-w-full rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div className="max-w-full overflow-x-auto">
                    <div className="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
                        <form className="space-y-6" onSubmit={handleSubmit}>
                            <div>
                                <label htmlFor="prosecutionReport" className="mb-2.5 block text-black dark:text-white">Report</label>
                                <div className="mt-2">
                                    <textarea className="w-full rounded border-[1.5px] border-stroke bg-white py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                              id="prosecutionReport" value={data.prosecutionReport} autoComplete="prosecutionReport" required onChange={ e => setData( data => ({...data, prosecutionReport: e.target.value}))}
                                    />
                                </div>
                                { errors && errors.prosecutionReport !== undefined && (
                                    <div className="flex justify-between">
                                        <p className="w-full text-sm text-danger">{errors.prosecutionReport}</p>
                                    </div>
                                )}
                            </div>

                            <div>
                                <label htmlFor="courtDecision" className="mb-2.5 block text-black dark:text-white">Court Decision</label>
                                <div className="mt-2">
                                    <select className="w-full rounded border-[1.5px] border-stroke bg-white py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                            id="courtDecision" value={data.courtDecision} autoComplete="courtDecision" required onChange={ e => setData( data => ({...data, courtDecision: e.target.value}))}
                                    >
                                        <option value={''}>Please select court decision</option>
                                        <option value={'to_convicted'}>Convicted</option>
                                        <option value={'to_innocent'}>Innocent</option>
                                        <option value={'to_withdrawn'}>Withdrawn</option>
                                    </select>
                                </div>
                                { errors && errors.courtDecision !== undefined && (
                                    <div className="flex justify-between">
                                        <p className="w-full text-sm text-danger">{errors.courtDecision}</p>
                                    </div>
                                )}
                            </div>

                            { data.courtDecision === 'to_convicted' && (
                                <div>
                                    <label htmlFor="prisonId" className="mb-2.5 block text-black dark:text-white">Prison</label>
                                    <div className="mt-2">
                                        <select className="w-full rounded border-[1.5px] border-stroke bg-white py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                                id="prisonId" value={data.prisonId} autoComplete="prisonId" required onChange={ e => setData( data => ({...data, prisonId: e.target.value}))}
                                        >
                                            <option value={0}>Please select prison</option>
                                            { prisons.data.map((prison, index) => {
                                                return (<option key={index} value={prison.id}>{`${prison.name} (${prison.prisonNo})`}</option>)
                                            })}
                                        </select>
                                    </div>
                                    { errors && errors.prisonId !== undefined && (
                                        <div className="flex justify-between">
                                            <p className="w-full text-sm text-danger">{errors.prisonId}</p>
                                        </div>
                                    )}
                                </div>
                            )}

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

export default AddProsecutionReport;
