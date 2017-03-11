#include <bits/stdc++.h>
using namespace std;

bool is_prime[100005];
int main() { 
    for(int i=2;i<100005;i++)
      is_prime[i]=false;
    for(int i=2;i<100005;i++)
      for(int j=2*i;j<100005;j+=i)
        is_prime[j]=false;
    int t;
    cin>>t;
    while(t--){
        int n;
        cin>>n;
        if(is_prime[n])
          cout<<"YES"<<endl;
        else
          cout<<"NO"<<endl;
    }
    
return(0); 
}