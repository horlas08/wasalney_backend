// lib/Models/airport_service_type.dart
class AirportServiceType {
  final int id;
  final String name;
  final String nameAr;
  final String type;
  final double basePrice;
  final double pricePerKm;
  final int freeWaitingTime;
  final double waitingPricePerHour;
  final int maxPassengers;
  final bool active;

  AirportServiceType({
    required this.id,
    required this.name,
    required this.nameAr,
    required this.type,
    required this.basePrice,
    required this.pricePerKm,
    required this.freeWaitingTime,
    required this.waitingPricePerHour,
    required this.maxPassengers,
    required this.active,
  });

  factory AirportServiceType.fromJson(Map<String, dynamic> json) {
    return AirportServiceType(
      id: json['id'],
      name: json['name'],
      nameAr: json['name_ar'],
      type: json['type'],
      basePrice: double.parse(json['base_price'].toString()),
      pricePerKm: double.parse(json['price_per_km'].toString()),
      freeWaitingTime: json['free_waiting_time'],
      waitingPricePerHour: double.parse(json['waiting_price_per_hour'].toString()),
      maxPassengers: json['max_passengers'],
      active: json['active'],
    );
  }
}