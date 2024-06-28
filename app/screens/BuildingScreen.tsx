// BuildingScreen
import React from "react";
import { View, Text, StyleSheet, Button } from "react-native";
import { useNavigation } from "@react-navigation/native";

const BuildingScreen = () => {
  const navigation = useNavigation();
  return (
    <View style={styles.container}>
      <Text>Building Screen</Text>
      <Button title="Go to Resident" onPress={() => navigation.navigate('Resident' as never)} />
    </View>
  );
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
    justifyContent: "center",
    alignItems: "center",
  },
});

export default BuildingScreen;