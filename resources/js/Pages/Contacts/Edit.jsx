import React from 'react';
import { useForm } from '@inertiajs/react';
import { useSpring, animated } from 'react-spring';
import DashboardLayout from '../../Layouts/DashboardLayout';

const Edit = ({ contact }) => {
    const { data, setData, put, errors } = useForm({
        first_name: contact.first_name,
        last_name: contact.last_name,
        email: contact.email,
        phone: contact.phone,
        address: contact.address,
    });

    const [props, set] = useSpring(() => ({ opacity: 0 }));

    React.useEffect(() => {
        set({ opacity: 1 });
    }, [set]);

    const handleSubmit = (e) => {
        e.preventDefault();
        put(`/contacts/${contact.id}`);
    };

    return (
        <DashboardLayout>
            <animated.div style={props} className="p-6 bg-white shadow-md rounded-lg">
                <h1 className="text-2xl font-semibold">Edit Contact</h1>
                <form onSubmit={handleSubmit} className="mt-4">
                    <div className="mb-4">
                        <label className="block text-gray-700">First Name</label>
                        <input
                            type="text"
                            value={data.first_name}
                            onChange={(e) => setData('first_name', e.target.value)}
                            className="mt-1 block w-full border border-gray-300 rounded-md p-2"
                        />
                        {errors.first_name && <p className="text-red-500 text-sm">{errors.first_name}</p>}
                    </div>
                    <div className="mb-4">
                        <label className="block text-gray-700">Last Name</label>
                        <input
                            type="text"
                            value={data.last_name}
                            onChange={(e) => setData('last_name', e.target.value)}
                            className="mt-1 block w-full border border-gray-300 rounded-md p-2"
                        />
                        {errors.last_name && <p className="text-red-500 text-sm">{errors.last_name}</p>}
                    </div>
                    <div className="mb-4">
                        <label className="block text-gray-700">Email</label>
                        <input
                            type="email"
                            value={data.email}
                            onChange={(e) => setData('email', e.target.value)}
                            className="mt-1 block w-full border border-gray-300 rounded-md p-2"
                        />
                        {errors.email && <p className="text-red-500 text-sm">{errors.email}</p>}
                    </div>
                    <div className="mb-4">
                        <label className="block text-gray-700">Phone</label>
                        <input
                            type="text"
                            value={data.phone}
                            onChange={(e) => setData('phone', e.target.value)}
                            className="mt-1 block w-full border border-gray-300 rounded-md p-2"
                        />
                        {errors.phone && <p className="text-red-500 text-sm">{errors.phone}</p>}
                    </div>
                    <div className="mb-4">
                        <label className="block text-gray-700">Address</label>
                        <textarea
                            value={data.address}
                            onChange={(e) => setData('address', e.target.value)}
                            className="mt-1 block w-full border border-gray-300 rounded-md p-2"
                        />
                        {errors.address && <p className="text-red-500 text-sm">{errors.address}</p>}
                    </div>
                    <button type="submit" className="p-2 bg-blue-500 text-white rounded">Update</button>
                </form>
            </animated.div>
        </DashboardLayout>
    );
};

export default Edit;
