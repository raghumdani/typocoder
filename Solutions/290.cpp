#include <iostream> 
using namespace std;

int main() { 
    int t;
    cin>>t;
    for(int i=0;i<t;i++)
    {
        int k;
        long long int n,l=0,now=1,c;
        cin>>n>>k;
        c=n;
        while(c>0)
        {
            l++;
            c/=2;
        }
        for(int j=l;j<=k;j++)
            now*=j;
        for(j=k+1;j<=n;j++)
            now*=k;
        if(l<k)
            now=0;
        cout<<(now%1000000007)<<endl;
    }
    return 0;
}