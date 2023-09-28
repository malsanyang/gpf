import React from "react";
import Layout from "../../Components/Layout/Layout";
import Breadcrumb from "../../Components/Shared/Breadcrumb";
import UserListProps from "../../Models/props_UserItem";
import {Head, Link} from "@inertiajs/react";
import CrimeListProps from "../../Models/props_CrimeItem";
import route from "ziggy";

interface CrimeShowPageProps {
    data: CrimeListProps,
    currentUser: { data: UserListProps } | null,
}

const Show = ({ data, currentUser } : CrimeShowPageProps) => {
    return (
        <Layout currentUser={currentUser?.data}>
            <Head title={'Crime Details'} />

            <Breadcrumb paths={['crimes', 'details']} />

            { data.status === 'Awaiting Investigation' && (
                <Link
                    href={route('crimes.add_investigation_report', data.id, undefined, undefined)}
                    className="flex inline-flex items-center justify-center rounded-md bg-primary py-2 px-2 my-4 text-center font-medium text-white hover:bg-opacity-90 lg:px-2 xl:px-2"
                >
                    Add Investigation Report
                </Link>
            )}

            { data.status === 'Awaiting Prosecution' && (
                <Link
                    href={route('crimes.add_prosecution_report', data.id, undefined, undefined)}
                    className="flex inline-flex items-center justify-center rounded-md bg-primary py-2 px-2 my-4 text-center font-medium text-white hover:bg-opacity-90 lg:px-2 xl:px-2"
                >
                    Add Prosecution Report
                </Link>
            )}

            <div className="w-full max-w-full">
                <div className="max-w-full overflow-x-auto">
                    <table className="w-full table-auto rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                        <tbody>
                        <tr>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark w-1/4">
                                <p className="text-black dark:text-white">Case Number</p>
                            </td>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">{data.caseNumber}</p>
                            </td>
                        </tr>
                        <tr>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">Location</p>
                            </td>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">{data.location}</p>
                            </td>
                        </tr>
                        <tr>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">Description</p>
                            </td>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">{data.description}</p>
                            </td>
                        </tr>
                        <tr>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">Witnessed By</p>
                            </td>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">{data.witnessedBy}</p>
                            </td>
                        </tr>
                        <tr>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">Officer</p>
                            </td>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">{data.policeOfficer.data.fullName}</p>
                            </td>
                        </tr>
                        <tr>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">Station</p>
                            </td>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">{data.policeStation.data.name}</p>
                            </td>
                        </tr>
                        <tr>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">Status</p>
                            </td>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">{data.status}</p>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <div className={'flex flex-row my-4 gap-4'}>
                        <table className="basis-1/2 table-auto rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                            <tbody>
                            <tr>
                                <td colSpan={2} className="border-b border-[#eee] py-5 px-4 dark:border-strokedark w-1/4">
                                    <p className="text-black dark:text-white text-center font-bold">Reported By</p>
                                </td>
                            </tr>
                            <tr>
                                <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                    <p className="text-black dark:text-white">Full Name</p>
                                </td>
                                <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                    <p className="text-black dark:text-white">{data.citizen.data.fullName}</p>
                                </td>
                            </tr>
                            <tr>
                                <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                    <p className="text-black dark:text-white">Address</p>
                                </td>
                                <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                    <p className="text-black dark:text-white">{data.citizen.data.address}</p>
                                </td>
                            </tr>
                            <tr>
                                <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                    <p className="text-black dark:text-white">Telephone No.</p>
                                </td>
                                <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                    <p className="text-black dark:text-white">{data.citizen.data.telephoneNo}</p>
                                </td>
                            </tr>
                            <tr>
                                <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                    <p className="text-black dark:text-white">Email Address</p>
                                </td>
                                <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                    <p className="text-black dark:text-white">{data.citizen.data.email}</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <table className="basis-1/2 table-auto rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                            <tbody>
                            <tr>
                                <td colSpan={2} className="border-b border-[#eee] py-5 px-4 dark:border-strokedark w-1/4">
                                    <p className="text-black dark:text-white text-center font-bold">Criminal</p>
                                </td>
                            </tr>
                            <tr>
                                <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                    <p className="text-black dark:text-white">Full Name</p>
                                </td>
                                <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                    <p className="text-black dark:text-white">{data.criminal.data.fullName}</p>
                                </td>
                            </tr>
                            <tr>
                                <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                    <p className="text-black dark:text-white">Address</p>
                                </td>
                                <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                    <p className="text-black dark:text-white">{data.criminal.data.address}</p>
                                </td>
                            </tr>
                            <tr>
                                <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                    <p className="text-black dark:text-white">Telephone No.</p>
                                </td>
                                <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                    <p className="text-black dark:text-white">{data.criminal.data.telephoneNo}</p>
                                </td>
                            </tr>
                            <tr>
                                <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                    <p className="text-black dark:text-white">DOB</p>
                                </td>
                                <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                    <p className="text-black dark:text-white">{new Date(data.criminal.data.dob).toLocaleDateString()}</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div className={'flex flex-row my-4 gap-4'}>
                        <table className="basis-1/2 table-auto rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                            <thead>
                            <tr>
                                <th colSpan={2} className="border-b border-[#eee] py-5 px-4 dark:border-strokedark w-1/4">
                                    <p className="text-black dark:text-white text-center font-bold">Court Information</p>
                                </th>
                            </tr>
                            </thead>
                            { data.court.data.id ? (
                                <tbody>
                                <tr>
                                    <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                        <p className="text-black dark:text-white">Court No.</p>
                                    </td>
                                    <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                        <p className="text-black dark:text-white">{data.court.data.courtNo}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                        <p className="text-black dark:text-white">Name</p>
                                    </td>
                                    <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                        <p className="text-black dark:text-white">{data.court.data.name}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                        <p className="text-black dark:text-white">Location</p>
                                    </td>
                                    <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                        <p className="text-black dark:text-white">{data.court.data.location}</p>
                                    </td>
                                </tr>
                                </tbody>
                            ) : (
                                <tbody>
                                <tr>
                                    <td colSpan={2} className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                        <p className="text-center text-black dark:text-white">Case is not yet at court</p>
                                    </td>
                                </tr>
                                </tbody>
                            ) }

                        </table>

                        <table className="basis-1/2 table-auto rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                            <thead>
                            <tr>
                                <th colSpan={2} className="border-b border-[#eee] py-5 px-4 dark:border-strokedark w-1/4">
                                    <p className="text-black dark:text-white text-center font-bold">Prison Information</p>
                                </th>
                            </tr>
                            </thead>
                            { data.prison.data.id ? (
                                <tbody>
                                <tr>
                                    <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                        <p className="text-black dark:text-white">Court No.</p>
                                    </td>
                                    <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                        <p className="text-black dark:text-white">{data.prison.data.prisonNo}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                        <p className="text-black dark:text-white">Name</p>
                                    </td>
                                    <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                        <p className="text-black dark:text-white">{data.prison.data.name}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                        <p className="text-black dark:text-white">Location</p>
                                    </td>
                                    <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                        <p className="text-black dark:text-white">{data.prison.data.location}</p>
                                    </td>
                                </tr>
                                </tbody>
                            ) : (
                                <tbody>
                                <tr>
                                    <td colSpan={2} className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                        <p className="text-center text-black dark:text-white">Case is not yet convicted</p>
                                    </td>
                                </tr>
                                </tbody>
                            ) }
                        </table>
                    </div>

                    <table className="w-full table-auto rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                        <tbody>
                        <tr>
                            <td colSpan={2} className="border-b border-[#eee] py-5 px-4 dark:border-strokedark w-1/4">
                                <p className="text-black dark:text-white font-bold text-center">Investigation Information</p>
                            </td>
                        </tr>
                        <tr>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">Investigator</p>
                            </td>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">{`${data.investigator.data.fullName} (${data.investigator.data.email})`}</p>
                            </td>
                        </tr>
                        <tr>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">Report</p>
                            </td>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">{data.investigationReport ? data.investigationReport : 'N/A'}</p>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <table className="w-full table-auto rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark mt-4">
                        <tbody>
                        <tr>
                            <td colSpan={2} className="border-b border-[#eee] py-5 px-4 dark:border-strokedark w-1/4">
                                <p className="text-black dark:text-white font-bold text-center">Prosecution Information</p>
                            </td>
                        </tr>
                        <tr>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">Prosecution</p>
                            </td>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">{data.prosecutor.data.id ? `${data.prosecutor.data.fullName} (${data.investigator.data.email})` : 'case not yet at prosecution'}</p>
                            </td>
                        </tr>
                        <tr>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">Report</p>
                            </td>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">{data.prosecutionReport ? data.prosecutionReport : 'N/A'}</p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </Layout>
    )
};

export default Show;
