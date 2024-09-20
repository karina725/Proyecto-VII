import React, { useState } from 'react';

const EmpleadoForm = () => {
  const [numeroEmpleado, setNumeroEmpleado] = useState('');
  const [nombreCompleto, setNombreCompleto] = useState('');

  const handleSubmit = (e) => {
    e.preventDefault();
    console.log({ numeroEmpleado, nombreCompleto });
  };

  return (
    <form onSubmit={handleSubmit}>
      <h2>Registrar Empleado</h2>
      <label>
        Número de Empleado:
        <input 
          type="text" 
          value={numeroEmpleado} 
          onChange={(e) => setNumeroEmpleado(e.target.value)} 
          required 
        />
      </label>
      <br />
      <label>
        Nombre Completo:
        <input 
          type="text" 
          value={nombreCompleto} 
          onChange={(e) => setNombreCompleto(e.target.value)} 
          required 
        />
      </label>
      <br />
      <button type="submit">Registrar</button>
    </form>
  );
};

export default EmpleadoForm;
