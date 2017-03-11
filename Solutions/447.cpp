#include <bits/stdc++.h> 
using namespace std;
  
int main() { 
    int n;
    long int sum2 = 0, sum1 = 0;
    cin >> n;
    vector<int> a(n);
    for (int i = 0; i<n; ++i)
    {
        cin >> a[i];
        sum2 = 2*sum2 + a[i];
    }
    sort (a.begin(), a.end());
    for (int i = 0; i<n; ++i)
    {
        sum1 = sum1*2 + a[i];
    }
    cout << sum2 - sum1;
     
      
    return(0);
}