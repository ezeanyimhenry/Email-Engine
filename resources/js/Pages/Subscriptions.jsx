import React, { useState } from "react";
import { Inertia } from "@inertiajs/inertia";
import { useSpring, animated } from "react-spring";
import Modal from "@/Components/Modal";
import DashboardLayout from "@/Layouts/DashboardLayout";

const SubscriptionPage = ({ plans }) => {
    const [selectedPlan, setSelectedPlan] = useState(null);
    const [showModal, setShowModal] = useState(false);

    // React Spring animations
    const modalSpring = useSpring({
        opacity: showModal ? 1 : 0,
        transform: showModal ? "translateY(0)" : "translateY(-20px)",
    });

    const handleSubscribe = (plan) => {
        setSelectedPlan(plan);
        setShowModal(true);
    };

    const handlePayment = async () => {
        const response = await fetch("/api/initialize-payment", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({
                amount: plans[selectedPlan].amount,
                plan: selectedPlan,
            }),
        });
        const data = await response.json();

        if (data.url) {
            window.location.href = data.url;
        }
    };

    return (
        <DashboardLayout>
            <div className="max-w-5xl mx-auto px-4 py-6">
                <h1 className="text-3xl font-semibold text-gray-800 mb-6">
                    Choose Your Subscription Plan
                </h1>
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    {Object.entries(plans).map(([key, plan]) => (
                        <div key={key} className="bg-white p-6 rounded-lg shadow-lg">
                            <h2 className="text-xl font-semibold text-gray-900">
                                {plan.name}
                            </h2>
                            <p className="text-gray-600 mt-2">{plan.description}</p>
                            <p className="text-lg font-bold mt-4">
                                ${plan.amount / 100} Monthly
                            </p>
                            <button
                                className="mt-4 px-6 py-3 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                onClick={() => handleSubscribe(key)}
                            >
                                Subscribe
                            </button>
                        </div>
                    ))}
                </div>

                <Modal
                    show={showModal}
                    maxWidth="md"
                    closeable={true}
                    onClose={() => setShowModal(false)}
                >
                    <animated.div style={modalSpring} className="p-6">
                        <h2 className="text-xl font-semibold mb-4">
                            Confirm Subscription
                        </h2>
                        <p className="mb-4">
                            Are you sure you want to subscribe to the{" "}
                            {plans[selectedPlan]?.name} plan?
                        </p>
                        <button
                            className="px-6 py-3 bg-green-600 text-white rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500"
                            onClick={handlePayment}
                        >
                            Proceed to Payment
                        </button>
                    </animated.div>
                </Modal>
            </div>
        </DashboardLayout>
    );
};

export default SubscriptionPage;
