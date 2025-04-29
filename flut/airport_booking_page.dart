class _AirportBookingPageState extends State<AirportBookingPage> {
  // ... existing variables ...
  List<AirportServiceType> serviceTypes = [];
  AirportServiceType? selectedServiceType;
  bool isLoading = true;

  @override
  void initState() {
    super.initState();
    _loadServiceTypes();
  }

  Future<void> _loadServiceTypes() async {
    try {
      final types = await AirportService.getServiceTypes();
      setState(() {
        serviceTypes = types;
        isLoading = false;
      });
    } catch (e) {
      setState(() => isLoading = false);
      Get.snackbar('Error', 'Failed to load service types');
    }
  }

  // Replace the car type selection with service type selection
  Widget _buildServiceTypeSelection() {
    if (isLoading) {
      return CircularProgressIndicator();
    }

    return Column(
      crossAxisAlignment: CrossAxisAlignment.start,
      children: [
        Text(
          '${AppController.of(context)!.value('car_type')}',
          style: AppController.fontStyle(fontTypes.header6, complementaryColorShade900),
        ),
        SizedBox(height: 10),
        SelectBox(
          options: serviceTypes.map((type) => type.name).toList(),
          value: selectedServiceType?.name,
          onSelect: (value) {
            setState(() {
              selectedServiceType = serviceTypes.firstWhere((type) => type.name == value);
            });
          },
          text: '${AppController.of(context)!.value('select_car_type')}',
          selectByModel: true,
        ),
        if (selectedServiceType != null) ...[
          SizedBox(height: 10),
          Text(
            'Base Price: \$${selectedServiceType!.basePrice.toStringAsFixed(2)}',
            style: AppController.fontStyle(fontTypes.bodySM, complementaryColorShade900),
          ),
          Text(
            'Max Passengers: ${selectedServiceType!.maxPassengers}',
            style: AppController.fontStyle(fontTypes.bodySM, complementaryColorShade900),
          ),
        ],
      ],
    );
  }

  // Modify the passenger counter to check against max passengers
  Widget _buildPassengerCounter(String label, int value, Function(int) onChanged) {
    final totalPassengers = adults + children + infants;
    final canAddMore = selectedServiceType == null || 
                      totalPassengers < selectedServiceType!.maxPassengers;

    return Column(
      crossAxisAlignment: CrossAxisAlignment.start,
      children: [
        Text(
          label,
          style: AppController.fontStyle(fontTypes.captionMD, complementaryColorShade900),
        ),
        SizedBox(height: 5),
        Row(
          children: [
            IconButton(
              icon: Icon(Icons.remove),
              onPressed: value > 0 ? () => onChanged(value - 1) : null,
            ),
            Text(
              value.toString(),
              style: AppController.fontStyle(fontTypes.bodySM, complementaryColorShade900),
            ),
            IconButton(
              icon: Icon(Icons.add),
              onPressed: canAddMore ? () => onChanged(value + 1) : null,
            ),
          ],
        ),
      ],
    );
  }

  // Modify the submit booking function
  void _submitBooking() {
    if (_formKey.currentState?.validate() ?? false) {
      if (selectedServiceType == null) {
        Get.snackbar('Error', 'Please select a service type');
        return;
      }
      // ... other validations ...

      final totalPassengers = adults + children + infants;
      if (totalPassengers > selectedServiceType!.maxPassengers) {
        Get.snackbar('Error', 'Maximum ${selectedServiceType!.maxPassengers} passengers allowed');
        return;
      }

      AppController.startLoading(['submit-booking']);
      
      // Create booking data
      final bookingData = {
        'service_type_id': selectedServiceType!.id,
        'booking_type': selectedBookingType,
        'pickup_location': pickupLocationController.text,
        'booking_date': '${selectedDate!.toIso8601String().split('T')[0]} ${selectedTime!.format(context)}',
        'adults': adults,
        'children': children,
        'infants': infants,
        'large_luggage': largeLuggage,
        'medium_luggage': mediumLuggage,
        'small_luggage': smallLuggage,
        'flight_number': flightNumberController.text,
        'notes': notesController.text,
      };

      // TODO: Submit booking to API
      // After submission:
      // AppController.finishLoading(['submit-booking']);
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      // ... existing scaffold ...
      child: Column(
        children: [
          // ... existing widgets ...
          _buildServiceTypeSelection(), // Replace car type selection with this
          // ... rest of the widgets ...
        ],
      ),
    );
  }
}