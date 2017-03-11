#include <stdio.h> 

bool is_prime[100005];

int main() { 
    int t;
    cin>>t;
    for(int i=2;i<100005;i++)
      is_prime[i]=true;
    for(int i=2;i<100005;i++)
      for(int j=2*i;j<100005;j+=i)
        is_prime[j]=false;
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