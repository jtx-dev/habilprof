import React, { useState, useEffect } from 'react';
import { createRoot } from 'react-dom/client';

function App() {
    const [status, setStatus] = useState('Iniciando...');
    const [rut, setRut] = useState('123456789');
    const [password, setPassword] = useState('12345678');
    const [result, setResult] = useState('');

    // Probar conexión
    const testConnection = async () => {
        try {
            const response = await fetch('/api/health');
            const data = await response.json();
            setStatus(`✅ Conectado: ${data.message}`);
        } catch (error) {
            setStatus(`❌ Error: ${error.message}`);
        }
    };

    // Login
    const handleLogin = async (e) => {
        e.preventDefault();
        setResult('Enviando...');

        try {
            console.log('Enviando login:', { rut: parseInt(rut), password: parseInt(password) });
            
            const response = await fetch('/api/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    rut: parseInt(rut),
                    password: parseInt(password)
                }),
            });

            const data = await response.json();
            console.log('Respuesta:', data);

            if (response.ok) {
                setResult(`✅ Login exitoso! Bienvenido ${data.user.name}`);
            } else {
                setResult(`❌ Error: ${data.message}`);
            }
        } catch (error) {
            setResult(`❌ Error de conexión: ${error.message}`);
        }
    };

    useEffect(() => {
        testConnection();
    }, []);

    return (
        <div style={{ padding: '2rem', maxWidth: '500px', margin: '0 auto', fontFamily: 'Arial' }}>
            <h1>🏢 HabilProf</h1>
            <p><strong>Estado:</strong> {status}</p>
            
            <button onClick={testConnection} style={{ margin: '10px 0', padding: '5px 10px' }}>
                Probar Conexión
            </button>

            <div style={{ marginTop: '2rem', padding: '1rem', border: '1px solid #ddd', borderRadius: '5px' }}>
                <h2>Login</h2>
                <form onSubmit={handleLogin}>
                    <div style={{ marginBottom: '1rem' }}>
                        <label>RUT (con dígito):</label>
                        <input 
                            type="number" 
                            value={rut}
                            onChange={(e) => setRut(e.target.value)}
                            style={{ width: '100%', padding: '8px', marginTop: '5px' }}
                        />
                    </div>
                    <div style={{ marginBottom: '1rem' }}>
                        <label>Contraseña (RUT sin dígito):</label>
                        <input 
                            type="number" 
                            value={password}
                            onChange={(e) => setPassword(e.target.value)}
                            style={{ width: '100%', padding: '8px', marginTop: '5px' }}
                        />
                    </div>
                    <button type="submit" style={{ padding: '10px 20px', background: '#007bff', color: 'white', border: 'none' }}>
                        Iniciar Sesión
                    </button>
                </form>
                
                {result && (
                    <div style={{ 
                        marginTop: '1rem', 
                        padding: '1rem', 
                        background: result.includes('✅') ? '#d4edda' : '#f8d7da',
                        border: result.includes('✅') ? '1px solid #c3e6cb' : '1px solid #f5c6cb',
                        borderRadius: '5px'
                    }}>
                        {result}
                    </div>
                )}
            </div>
        </div>
    );
}

// Montar la aplicación
const container = document.getElementById('root');
const root = createRoot(container);
root.render(<App />);