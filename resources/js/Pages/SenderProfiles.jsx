import React, { useState } from "react";
import { useForm } from "@inertiajs/inertia-react";
import { useSpring, animated } from "react-spring";
import DashboardLayout from "../Layouts/DashboardLayout";

export default function SenderProfiles({ profiles }) {
    const { data, setData, post, processing, errors } = useForm({
        email_address: "",
        sender_name: "",
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        post("/settings/sender-profiles", {
            onSuccess: () => {
                // Handle successful form submission (e.g., show a success message)
            },
        });
    };

    const profileSpring = useSpring({
        opacity: 1,
        transform: "translateY(0)",
    });

    return (
        <DashboardLayout>
            <div className="max-w-3xl mx-auto px-4 py-6">
                <h1 className="text-2xl font-semibold text-gray-800">
                    Sender Profiles Management
                </h1>
                <form onSubmit={handleSubmit} className="mt-6 space-y-6">
                    <div>
                        <label className="block text-sm font-medium text-gray-700">
                            Email Address
                        </label>
                        <input
                            type="email"
                            value={data.email_address}
                            onChange={(e) =>
                                setData("email_address", e.target.value)
                            }
                            className="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        />
                        {errors.email_address && (
                            <p className="text-red-600 text-sm">
                                {errors.email_address}
                            </p>
                        )}
                    </div>

                    <div>
                        <label className="block text-sm font-medium text-gray-700">
                            Sender Name
                        </label>
                        <input
                            type="text"
                            value={data.sender_name}
                            onChange={(e) =>
                                setData("sender_name", e.target.value)
                            }
                            className="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        />
                        {errors.sender_name && (
                            <p className="text-red-600 text-sm">
                                {errors.sender_name}
                            </p>
                        )}
                    </div>

                    <animated.div style={profileSpring}>
                        <div>
                            <button
                                type="submit"
                                className="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                disabled={processing}
                            >
                                {processing ? "Saving..." : "Save Profile"}
                            </button>
                        </div>
                    </animated.div>
                </form>

                <div className="mt-8">
                    <h2 className="text-lg font-medium text-gray-800">
                        Existing Sender Profiles
                    </h2>
                    <ul className="mt-4 space-y-4">
                        {profiles.map((profile) => (
                            <li
                                key={profile.id}
                                className="flex justify-between items-center p-4 border border-gray-300 rounded-md"
                            >
                                <div>
                                    <p className="text-sm font-medium text-gray-700">
                                        {profile.email_address}
                                    </p>
                                    <p className="text-sm text-gray-500">
                                        {profile.sender_name}
                                    </p>
                                </div>
                                <button
                                    type="button"
                                    className="text-red-600 hover:text-red-700"
                                    onClick={() => handleDelete(profile.id)}
                                >
                                    Delete
                                </button>
                            </li>
                        ))}
                    </ul>
                </div>
            </div>
        </DashboardLayout>
    );

    function handleDelete(id) {
        // Implement deletion logic here
    }
}
