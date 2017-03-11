#include <iostream> 

int main() { 
    int t;
    cin>>t;
    for(i=0;i<t;i++)
    {
        int k;
        long long int n,no=0,now=1,k;
        cin>>n>>k;
        k=n;
        while(k>0)
        {
            no++;
            k/=2;
        }
        for(i=n-k+1;i<=n;i++)
            now*=i;
        if(no<k)
            now=0;
        cout<<now<<endl;
    }
    return 0;
}