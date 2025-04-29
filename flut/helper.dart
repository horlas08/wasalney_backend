// Add this to your state class
double calculateTotalPrice() {
  if (selectedServiceType == null) return 0.0;
  
  // This is a simplified calculation. You might want to get actual distance from a map API
  final basePrice = selectedServiceType!.basePrice;
  final distancePrice = 0.0; // Calculate based on actual distance
  final waitingPrice = 0.0; // Calculate based on waiting time
  
  return basePrice + distancePrice + waitingPrice;
}

// Add this widget to show the price
Widget _buildPriceDisplay() {
  return Container(
    padding: EdgeInsets.all(15),
    decoration: BoxDecoration(
      color: Colors.grey[100],
      borderRadius: BorderRadius.circular(8),
    ),
    child: Column(
      crossAxisAlignment: CrossAxisAlignment.start,
      children: [
        Text(
          'Estimated Price',
          style: AppController.fontStyle(fontTypes.header6, complementaryColorShade900),
        ),
        SizedBox(height: 10),
        Text(
          '\$${calculateTotalPrice().toStringAsFixed(2)}',
          style: AppController.fontStyle(fontTypes.header4, primaryColor),
        ),
      ],
    ),
  );
}