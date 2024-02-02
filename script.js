document.addEventListener('DOMContentLoaded', function() {
    const typeSelect = document.getElementById('type');
    const batteryCapacityGroup = document.getElementById('battery-capacity-group');
    const fuelEfficiencyGroup = document.getElementById('fuel-efficiency-group');

    typeSelect.addEventListener('change', function() {
        if (typeSelect.value === 'Electric') {
            batteryCapacityGroup.style.display = 'block';
            fuelEfficiencyGroup.style.display = 'none';
        } else if (typeSelect.value === 'Gas') {
            fuelEfficiencyGroup.style.display = 'block';
            batteryCapacityGroup.style.display = 'none';
        } else {
            // Handle invalid selection (optional)
            batteryCapacityGroup.style.display = 'none';
            fuelEfficiencyGroup.style.display = 'none';
        }
    });
});
