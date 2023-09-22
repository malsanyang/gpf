import React from "react";
import Layout from "../../Components/Layout/Layout";
import Breadcrumb from "../../Components/Shared/Breadcrumb";
import UserListProps from "../../Models/props_UserItem";
import {Head, useForm} from "@inertiajs/react";
import RoleListProps from "../../Models/props_RoleItem";
import PoliceStationListProps from "../../Models/props_PoliceStationItem";

interface UserCreatePageProps {
    roles: { data : Array<RoleListProps> },
    stations: { data: Array<PoliceStationListProps> },
    currentUser: { data: UserListProps } | null,
}

const Create = ({ roles, stations, currentUser } : UserCreatePageProps) => {
    const { data, setData, post, processing, errors} = useForm({
        firstName: '',
        lastName: '',
        address: '',
        telephoneNo: '',
        email: '',
        password: '',
        role: '',
        stationId: '',
    });

    function handleSubmit(e: any) {
        e.preventDefault();
        post('/user-management/users');
    }

    console.debug(errors);

    return (
        <Layout currentUser={currentUser?.data}>
            <Head title={'Create User'} />

            <Breadcrumb paths={['user-management', 'create-user']} />

            <div className="w-full max-w-full rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div className="max-w-full overflow-x-auto">
                    <div className="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
                        <form className="space-y-6" onSubmit={handleSubmit}>
                            <div>
                                <label htmlFor="firstName" className="mb-2.5 block text-black dark:text-white">First Name</label>
                                <div className="mt-2">
                                    <input className="w-full rounded border-[1.5px] border-stroke bg-white py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                        id="firstName" value={data.firstName} autoComplete="firstName" required onChange={ e => setData('firstName', e.target.value)}
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
                                           id="lastName" value={data.lastName} autoComplete="lastName" required onChange={ e => setData('lastName', e.target.value)}
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
                                           id="address" value={data.address} autoComplete="address" required onChange={ e => setData('address', e.target.value)}
                                    />
                                </div>
                                { errors && errors.address !== undefined && (
                                    <div className="flex justify-between">
                                        <p className="w-full text-sm text-danger">{errors.address}</p>
                                    </div>
                                )}
                            </div>

                            <div>
                                <label htmlFor="telephoneNo" className="mb-2.5 block text-black dark:text-white">Telephone Number</label>
                                <div className="mt-2">
                                    <input className="w-full rounded border-[1.5px] border-stroke bg-white py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                           id="telephoneNo" value={data.telephoneNo} autoComplete="telephoneNo" required onChange={ e => setData('telephoneNo', e.target.value)}
                                    />
                                </div>
                                { errors && errors.telephoneNo !== undefined && (
                                    <div className="flex justify-between">
                                        <p className="w-full text-sm text-danger">{errors.telephoneNo}</p>
                                    </div>
                                )}
                            </div>

                            <div>
                                <label htmlFor="email" className="mb-2.5 block text-black dark:text-white">Email address</label>
                                <div className="mt-2">
                                    <input className="w-full rounded border-[1.5px] border-stroke bg-white py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                        id="email" type={'email'} value={data.email} autoComplete="email" required onChange={ e => setData('email', e.target.value)}
                                        />
                                </div>
                                { errors && errors.email !== undefined && (
                                    <div className="flex justify-between">
                                        <p className="w-full text-sm text-danger">{errors.email}</p>
                                    </div>
                                )}
                            </div>

                            <div>
                                <label htmlFor="password" className="mb-2.5 block text-black dark:text-white">Password</label>
                                <div className="mt-2">
                                    <input className="w-full rounded border-[1.5px] border-stroke bg-white py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                        id="password" type="password" value={data.password} autoComplete="password" required onChange={ e => setData('password', e.target.value)}
                                        />
                                </div>
                                { errors && errors.password !== undefined && (
                                    <div className="flex justify-between">
                                        <p className="w-full text-sm text-danger">{errors.password}</p>
                                    </div>
                                )}
                            </div>

                            <div>
                                <label htmlFor="role" className="mb-2.5 block text-black dark:text-white">Role</label>
                                <div className="mt-2">
                                    <select className="w-full rounded border-[1.5px] border-stroke bg-white py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                        id="role" value={data.role} autoComplete="role" required onChange={ e => setData('role', e.target.value)}
                                        >
                                        <option value={''}>Please select a role</option>
                                        { roles.data.map((role, index) => {
                                            return (<option value={role.name} key={index}>{role.name}</option>)
                                        })}
                                    </select>
                                    { errors && errors.role !== undefined && (
                                        <div className="flex justify-between">
                                            <p className="w-full text-sm text-danger">{errors.role}</p>
                                        </div>
                                    )}
                                </div>
                            </div>

                            { (data.role === 'PoliceOfficer' || data.role === 'Investigator') && (
                                <div>
                                    <label htmlFor="stationId" className="mb-2.5 block text-black dark:text-white">Police Station</label>
                                    <div className="mt-2">
                                        <select className="w-full rounded border-[1.5px] border-stroke bg-white py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                                id="stationId" value={data.stationId} autoComplete="stationId" required onChange={ e => setData('stationId', e.target.value)}
                                        >
                                            <option value={''}>Please select a station</option>
                                            { stations.data.map((station, index) => {
                                                return (<option value={station.id} key={index}>{station.name}</option>)
                                            })}
                                        </select>
                                        { errors && errors.stationId !== undefined && (
                                            <div className="flex justify-between">
                                                <p className="w-full text-sm text-danger">{errors.stationId}</p>
                                            </div>
                                        )}
                                    </div>
                                </div>
                            )}

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
