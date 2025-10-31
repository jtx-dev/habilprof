// resources/js/components/Auth/Login.jsx
import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import { useAuth } from '../../context/AuthContext';

function Login() {
    const [formData, setFormData] = useState({
        rut: '', // RUT completo con dígito verificador
        password: '', // Contraseña = RUT sin dígito verificador
    });
    const [error, setError] = useState('');
    const [loading, setLoading] = useState(false);
    
    const { login } = useAuth();
    const navigate = useNavigate();

    const handleChange = (e) => {
        setFormData({
            ...formData,
            [e.target.name]: e.target.value
        });
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        setLoading(true);
        setError('');

        // Convertir a números
        const rutCompleto = parseInt(formData.rut.replace(/\D/g, ''), 10);
        const password = parseInt(formData.password.replace(/\D/g, ''), 10);
        
        if (isNaN(rutCompleto) || isNaN(password)) {
            setError('Ambos campos deben ser números válidos');
            setLoading(false);
            return;
        }

        const result = await login(rutCompleto, password);
        
        if (result.success) {
            navigate('/dashboard');
        } else {
            setError(result.error);
        }
        
        setLoading(false);
    };

    return (
        <div className="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
            <div className="max-w-md w-full space-y-8">
                <div className="text-center">
                    <div className="mx-auto h-16 w-16 bg-blue-600 rounded-full flex items-center justify-center">
                        <span className="text-white font-bold text-xl">HP</span>
                    </div>
                    <h2 className="mt-6 text-center text-3xl font-extrabold text-gray-900">
                        HabilProf
                    </h2>
                    <p className="mt-2 text-center text-sm text-gray-600">
                        Sistema de Habilitación Profesional
                    </p>
                    <p className="mt-1 text-center text-xs text-gray-500">
                        Acceso para Profesores
                    </p>
                </div>
                
                <form className="mt-8 space-y-6" onSubmit={handleSubmit}>
                    {error && (
                        <div className="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                            {error}
                        </div>
                    )}
                    
                    <div className="space-y-4">
                        <div>
                            <label htmlFor="rut" className="block text-sm font-medium text-gray-700">
                                RUT Completo
                            </label>
                            <input
                                id="rut"
                                name="rut"
                                type="text"
                                inputMode="numeric"
                                pattern="[0-9]*"
                                required
                                className="mt-1 appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="212516481"
                                value={formData.rut}
                                onChange={handleChange}
                                maxLength="9"
                            />
                            <p className="text-xs text-gray-500 mt-1">
                                Ingrese su RUT completo con dígito verificador
                            </p>
                        </div>
                        <div>
                            <label htmlFor="password" className="block text-sm font-medium text-gray-700">
                                Contraseña
                            </label>
                            <input
                                id="password"
                                name="password"
                                type="password"
                                inputMode="numeric"
                                pattern="[0-9]*"
                                required
                                className="mt-1 appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="21251648"
                                value={formData.password}
                                onChange={handleChange}
                                maxLength="8"
                            />
                            <p className="text-xs text-gray-500 mt-1">
                                Ingrese su RUT sin dígito verificador
                            </p>
                        </div>
                    </div>

                    <div>
                        <button
                            type="submit"
                            disabled={loading}
                            className="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 disabled:opacity-50"
                        >
                            {loading ? 'Iniciando sesión...' : 'Iniciar Sesión'}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    );
}

export default Login;