import React from 'react';
import { useSpring, animated } from 'react-spring';
import DashboardLayout from '../../Layouts/DashboardLayout';

const Show = ({ contact }) => {
    const [props, set] = useSpring(() => ({ opacity: 0 }));

    React.useEffect(() => {
        set({ opacity: 1 });
    }, [set]);

    return (
        <DashboardLayout>
            <animated.div style={props} className="p-6 bg-white shadow-md rounded-lg">
                <h1 className="text-2xl font-semibold">Contact Details</h1>
                <div className="mt-4">
                    <p><strong>First Name:</strong> {contact.first_name}</p>
                    <p><strong>Last Name:</strong> {contact.last_name}</p>
                    <p><strong>Email:</strong> {contact.email}</p>
                    <p><strong>Phone:</strong> {contact.phone}</p>
                    <p><strong>Address:</strong> {contact.address}</p>
                </div>
                <a href={`/contacts/${contact.id}/edit`} className="mt-4 inline-block p-2 bg-blue-500 text-white rounded">Edit</a>
                <a href="/contacts" className="ml-4 inline-block p-2 bg-gray-500 text-white rounded">Back</a>
            </animated.div>
        </DashboardLayout>
    );
};

export default Show;
